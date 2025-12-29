<?php

namespace Modules\Blog\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Blog\Http\Requests\BlogRequest;
use Modules\Blog\Models\Blog;
use Modules\CustomField\Models\CustomField;
use Modules\CustomField\Models\CustomFieldGroup;
use Yajra\DataTables\DataTables;

use Modules\Category\Models\Category;

class BlogController extends Controller
{
    // use Authorizable;

    protected string $exportClass = '\App\Exports\BlogExport';

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Blogs';

        // module name
        $this->module_name = 'blogs';

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
        $columns = CustomFieldGroup::columnJsonValues(new Blog());
        $customefield = CustomField::exportCustomFields(new Blog());

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
        $export_url = route('backend.blogs.export');

        return view('blog::backend.blogs.index_datatable', compact('module_name', 'filter', 'module_action', 'columns', 'customefield', 'export_import', 'export_columns', 'export_url'));
    }

    /**
     * Select Options for Select 2 Request/ Response.
     *
     * @return Response
     */
    public function index_list(Request $request)
    {
        
        $query_data = Category::whereNull('parent_id')
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

    public function bulk_action(Request $request)
    {
        $ids = explode(',', $request->rowIds);

        $actionType = $request->action_type;

        $message = __('messages.bulk_update');

        switch ($actionType) {
            case 'change-status':
                $branches = Blog::whereIn('id', $ids)->update(['status' => $request->status]);
                $message = __('messages.bulk_Blog_update');
                break;

            case 'delete':
                if (env('IS_DEMO')) {
                    return response()->json(['message' => __('messages.permission_denied'), 'status' => false], 200);
                }

                Blog::whereIn('id', $ids)->delete();
                $message = __('messages.bulk_Blog_update');
                break;

            default:
                return response()->json(['status' => false, 'message' => __('branch.invalid_action')]);
                break;
        }

        return response()->json(['status' => true, 'message' => __('messages.bulk_update')]);
    }

    public function update_status(Request $request, Blog $id)
    {
        $id->update(['status' => $request->status]);

        return response()->json(['status' => true, 'message' => __('branch.status_update')]);
    }

    public function index_data(Datatables $datatable, Request $request)
    {
        $edit_permission = 'edit_blogs';
        $delete_permission = 'delete_blogs';
        $module_name = $this->module_name;
        $query = Blog::query()->with('media');

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
                return view('blog::backend.blogs.action_column', compact('module_name', 'data', 'edit_permission', 'delete_permission'));
            })
            ->addColumn('image', function ($data) {
                return "<img src='".$data->blog_image."' class='avatar avatar-50 rounded-pill'>";
            })
            ->editColumn('status', function ($row) {
                $checked = '';
                if ($row->status) {
                    $checked = 'checked="checked"';
                }

                return '
                    <div class="form-check form-switch ">
                        <input type="checkbox" data-url="'.route('backend.blogs.update_status', $row->id).'" data-token="'.csrf_token().'" class="switch-status-change form-check-input"  id="datatable-row-'.$row->id.'"  name="status" value="'.$row->id.'" '.$checked.'>
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
        $customFieldColumns = CustomField::customFieldData($datatable, Blog::CUSTOM_FIELD_MODEL, null);

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
        $data = $request->except('blog_image');

        $query = Blog::create($data);

        if ($request->custom_fields_data) {

            $query->updateCustomFieldData(json_decode($request->custom_fields_data));
        }

        storeMediaFile($query, $request->file('blog_image') , 'blog_image');


        if ($request->hasFile('banner')){
            storeMediaFile($query, $request->file('banner') , 'banner');
        }

        $message = __('messages.create_form', ['form' => __('Blog')]);

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

        $data = Blog::findOrFail($id);

        return view('blog::backend.blogs.show', compact('module_action', "$data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $data = Blog::with('category')->findOrFail($id);

        if (! is_null($data)) {
            $custom_field_data = $data->withCustomFields();
            $data['custom_field_data'] = collect($custom_field_data->custom_fields_data)
                ->filter(function ($value) {
                    return $value !== null;
                })
                ->toArray();
        }

        $data['blog_image'] = $data->blog_image;
        $data['category_name'] = $data->category->name;
    
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
        $query = Blog::findOrFail($id);

        $data = $request->except('blog_image');

        $query->update($data);

        if ($request->custom_fields_data) {

            $query->updateCustomFieldData(json_decode($request->custom_fields_data));
        }

        storeMediaFile($query, $request->file('blog_image') , 'blog_image');

        if ($request->hasFile('banner')){
            storeMediaFile($query, $request->file('banner') , 'banner');
        }

        $message = __('messages.update_form', ['form' => __('Blog')]);

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

        $data = Blog::findOrFail($id);

        $data->delete();

        $message = __('messages.delete_form', ['form' => __('Blog')]);

        return response()->json(['message' => $message, 'status' => true], 200);
    }

    
}
