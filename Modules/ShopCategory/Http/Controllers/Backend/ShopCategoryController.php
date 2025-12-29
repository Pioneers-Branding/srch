<?php

namespace Modules\ShopCategory\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\ShopCategory\Models\ShopCategory;
use Modules\CustomField\Models\CustomField;
use Modules\CustomField\Models\CustomFieldGroup;
use Yajra\DataTables\DataTables;

class ShopCategoryController extends Controller
{
    // use Authorizable;

    protected string $exportClass = '\App\Exports\CategoryExport';

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Gallerys';

        // module name
        $this->module_name = 'shopcategories';

        view()->share([
            'module_title' => $this->module_title,
            'module_icon' => 'fa-regular fa-sun',
            'module_name' => $this->module_name,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $filter = [
            'status' => $request->status,
        ];
        $module_name = $this->module_name;
        $module_action = 'List';
        $columns = CustomFieldGroup::columnJsonValues(new ShopCategory());
        $customefield = CustomField::exportCustomFields(new ShopCategory());

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
        $export_url = route('backend.shopcategories.export');

        return view('shopcategory::backend.shopcategory.index_datatable', compact('module_name', 'filter', 'module_action', 'columns', 'customefield', 'export_import', 'export_columns', 'export_url'));
    }

    /**
     * Select Options for Select 2 Request/ Response.
     *
     * @return Response
     */
    public function index_list(Request $request)
    {
        $term = trim($request->q);

        $query_data = ShopCategory::where(function ($q) use ($parentID) {
            if (! empty($term)) {
                $q->orWhere('name', 'LIKE', "%$term%");
            }
        })
            ->where('status', 1) // Add this line to filter by status
            ->get();

        $data = [];

        foreach ($query_data as $row) {
            $data[] = [
                'id' => $row->id,
                'name' => $row->name,
            ];
        }

        return response()->json($data);
    }

    public function update_status(Request $request, ShopCategory $id)
    {
        $id->update(['status' => $request->status]);

        return response()->json(['status' => true, 'message' => __('Category Status Changed Successfully')]);
    }

    public function index_data(Datatables $datatable, Request $request)
    {
        $edit_permission = 'edit_shop_category';
        $delete_permission = 'delete_shop_category';
        $module_name = $this->module_name;
        $query = ShopCategory::query()->with('media');

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
            ->addColumn('action', function ($data) use ($module_name, $edit_permission, $delete_permission) {
                return view('shopcategory::backend.shopcategory.action_column', compact('module_name', 'data', 'edit_permission', 'delete_permission'));
            })
            ->addColumn('image', function ($data) {
                return "<img src='".$data->feature_image."' class='avatar avatar-50 rounded-pill'>";
            })
            ->editColumn('status', function ($row) {
                $checked = '';
                if ($row->status) {
                    $checked = 'checked="checked"';
                }

                return '
                    <div class="form-check form-switch ">
                        <input type="checkbox" data-url="'.route('backend.shopcategories.update_status', $row->id).'" data-token="'.csrf_token().'" class="switch-status-change form-check-input"  id="datatable-row-'.$row->id.'"  name="status" value="'.$row->id.'" '.$checked.'>
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
        $customFieldColumns = CustomField::customFieldData($datatable, ShopCategory::CUSTOM_FIELD_MODEL, null);

        return $datatable->rawColumns(array_merge(['action', 'status', 'image', 'check', 'name'], $customFieldColumns))
            ->toJson();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->except('feature_image');

        $query = ShopCategory::create($data);

        if ($request->custom_fields_data) {

            $query->updateCustomFieldData(json_decode($request->custom_fields_data));
        }

        storeMediaFile($query, $request->file('feature_image'));

        $message = __('messages.create_form', ['form' => __('gallery')]);

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

        $data = ShopCategory::with('media')->findOrFail($id);

        return view('shopcategory::backend.shopcategory.show', compact('module_action', "$data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $data = ShopCategory::with('media')->findOrFail($id);

        if (! is_null($data)) {
            $custom_field_data = $data->withCustomFields();
            $data['custom_field_data'] = collect($custom_field_data->custom_fields_data)
                ->filter(function ($value) {
                    return $value !== null;
                })
                ->toArray();
        }

        $data['feature_image'] = $data->feature_image;

        return response()->json(['data' => $data, 'status' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $query = ShopCategory::findOrFail($id);

        $data = $request->except('feature_image');

        $query->update($data);

        if ($request->custom_fields_data) {

            $query->updateCustomFieldData(json_decode($request->custom_fields_data));
        }

        storeMediaFile($query, $request->file('feature_image'));

        $message = __('messages.update_form', ['form' => __('gallery')]);

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

        $data = ShopCategory::findOrFail($id);

        $data->delete();

        $message = __('messages.delete_form', ['form' => __('category.singular_title')]);

        return response()->json(['message' => $message, 'status' => true], 200);
    }

}
