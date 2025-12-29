<?php

namespace Modules\ChildCategory\Http\Controllers;


use App\Authorizable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\ChildCategory\Http\Requests\ChildCategoryRequest;
use Modules\ChildCategory\Models\ChildCategory;
use Modules\Category\Models\Category;
use Modules\CustomField\Models\CustomField;
use Modules\CustomField\Models\CustomFieldGroup;
use Yajra\DataTables\DataTables;

class ChildCategoryController extends Controller
{

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Child Categories';

        // module name
        $this->module_name = 'childcategories';

        view()->share([
            'module_title' => $this->module_title,
            'module_icon' => 'fa-regular fa-sun',
            'module_name' => $this->module_name,
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        $filter = [
            'status' => $request->status,
        ];
        $module_name = $this->module_name;
        $module_action = 'List';
        $columns = CustomFieldGroup::columnJsonValues(new ChildCategory());
        $customefield = CustomField::exportCustomFields(new ChildCategory());

        $export_import = true;
        $export_columns = [
            [
                'value' => 'name',
                'text' => 'Name',
            ],
            [
                'value' => 'status',
                'text' => 'Status',
            ],
        ];
        $export_url = route('backend.categories.export');


        return view('childcategory::backend.childcategories.index_datatable' , compact('module_name', 'filter', 'module_action', 'columns', 'customefield', 'export_import', 'export_columns', 'export_url'));
    }

    public function index_list(Request $request)
    {
       
        $query_data = Category::with('mainCategory')->whereNotNull('parent_id')->where('status', 1)->get();

        $data = [];

        foreach ($query_data as $row) {
            $mainCatgeory = isset($row->mainCategory->name) ? $row->mainCategory->name : '' ;
            $data[] = [
                'id' => $row->id,
                'name' => $row->name."($mainCatgeory)",
            ];
        }

        return response()->json($data);
    }


    public function update_status(Request $request, ChildCategory $id)
    {
        $id->update(['status' => $request->status]);

        return response()->json(['status' => true, 'message' => __('branch.status_update')]);
    }

    public function index_data(Datatables $datatable, Request $request)
    {
        $edit_permission = 'edit_childcategory';
        $delete_permission = 'delete_childcategory';
        $module_name = $this->module_name;
        $query = ChildCategory::query()->latest()->with('sub_category');

        $filter = $request->filter;

        if (isset($filter)) {
            if (isset($filter['column_status'])) {
                $query->where('status', $filter['column_status']);
            }
        }

        $datatable = $datatable->eloquent($query)
            ->addColumn('check', function ($row) {
                return '<input type="checkbox" class="form-check-input select-table-row"  id="datatable-row-'.$row->id.'"  name="datatable_ids[]" value="'.$row->id.'" onclick="dataTableRowCheck('.$row->id.')">';
            })
            ->editColumn('name', function ($row) use ($module_name) {
                return $row->name;
            })
            ->editColumn('sub_id', function ($row) use ($module_name) {
                return isset($row->sub_category->name)? $row->sub_category->name : '' ;
            })
            
            ->addColumn('image', function ($data) {
                return "<img src='".$data->feature_image."' class='avatar avatar-50 rounded-pill'>";
            })

            ->addColumn('action', function ($data) use ($module_name, $edit_permission, $delete_permission) {
                return view('childcategory::backend.childcategories.action_column', compact('module_name', 'data', 'edit_permission', 'delete_permission'));
            })
            ->editColumn('status', function ($row) {
                $checked = '';
                if ($row->status) {
                    $checked = 'checked="checked"';
                }

                return '
                    <div class="form-check form-switch ">
                        <input type="checkbox" data-url="'.route('backend.childcategories.update_status', $row->id).'" data-token="'.csrf_token().'" class="switch-status-change form-check-input"  id="datatable-row-'.$row->id.'"  name="status" value="'.$row->id.'" '.$checked.'>
                    </div>
                ';
            })
            ->editColumn('updated_at', function ($data) {
                $module_name = $this->module_name;

                $diff = Carbon::now()->diffInHours($data->updated_at);

                if ($diff < 25) {
                    return $data->updated_at->diffForHumans();
                } else {
                    return $data->updated_at->isoFormat('llll');
                }
            })
            ->editColumn('created_at', function ($data) {
                $module_name = $this->module_name;

                $diff = Carbon::now()->diffInHours($data->created_at);

                if ($diff < 25) {
                    return $data->created_at->diffForHumans();
                } else {
                    return $data->created_at->isoFormat('llll');
                }
            })
            ->orderColumns(['id'], '-:column $1');

        // Custom Fields For export
        $customFieldColumns = CustomField::customFieldData($datatable, ChildCategory::CUSTOM_FIELD_MODEL, null);

        return $datatable->rawColumns(array_merge(['action', 'status', 'image' , 'check', 'name'], $customFieldColumns))
            ->toJson();
    }

    
    public function store(ChildCategoryRequest $request)
    {
    
        // $data = $request->all();
        
        $data = $request->except('feature_image');
        

        $query = ChildCategory::create($data);
    
        if ($request->custom_fields_data) {

            $query->updateCustomFieldData(json_decode($request->custom_fields_data));
        }
        storeMediaFile($query, $request->file('feature_image'));    

        $message = __('messages.create_form', ['form' => __('Child category')]);

        return response()->json(['message' => $message, 'status' => true], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $module_action = 'Show';

        $data = ChildCategory::with('sub_category')->findOrFail($id);

        return view('childcategory::backend.childcategories.show', compact('module_action', "$data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $data = ChildCategory::with('sub_category')->findOrFail($id);

        if (! is_null($data)) {
            $custom_field_data = $data->withCustomFields();
            $data['custom_field_data'] = collect($custom_field_data->custom_fields_data)
                ->filter(function ($value) {
                    return $value !== null;
                })
                ->toArray();
        }

        $data['category_name'] = $data->sub_category->name ?? null;

        return response()->json(['data' => $data, 'status' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ChildCategoryRequest $request, $id)
    {
        $query = ChildCategory::findOrFail($id);

        // $data = $request->all();
        $data = $request->except('feature_image');

        $query->update($data);

        if ($request->custom_fields_data) {

            $query->updateCustomFieldData(json_decode($request->custom_fields_data));
        }
        
        storeMediaFile($query, $request->file('feature_image')); 
        
        $message = __('messages.update_form', ['form' => __('Child Category ')]);

        return response()->json(['message' => $message, 'status' => true], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        if (env('IS_DEMO')) {
            return response()->json(['message' => __('messages.permission_denied'), 'status' => false], 200);
        }

        $data = ChildCategory::findOrFail($id);

        $data->delete();

        $message = __('messages.delete_form', ['form' => __('Child Category')]);

        return response()->json(['message' => $message, 'status' => true], 200);
    }
}
