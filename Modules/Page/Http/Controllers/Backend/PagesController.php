<?php

namespace Modules\Page\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\CustomField\Models\CustomFieldGroup;
use Modules\Page\Models\Page;
use Yajra\DataTables\DataTables;

class PagesController extends Controller
{
    // use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Gallery';

        // module name
        $this->module_name = 'pages';

        // directory path of the module
        $this->module_path = 'page::backend';

        view()->share([
            'module_title' => $this->module_title,
            'module_icon' => 'fa-regular fa-sun',
            'module_name' => $this->module_name,
            'module_path' => $this->module_path,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $module_action = 'List';

        $filter = [
            'status' => $request->status,
        ];
        $columns = CustomFieldGroup::columnJsonValues(new Page());
        

        return view('page::backend.pages.index_datatable', compact('module_action', 'filter', 'columns'));
    }

    /**
     * Select Options for Select 2 Request/ Response.
     *
     * @return Response
     */
    public function index_list(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }

        $query_data = Page::where('name', 'LIKE', "%$term%")->orWhere('slug', 'LIKE', "%$term%")->limit(7)->get();

        $data = [];

        foreach ($query_data as $row) {
            $data[] = [
                'id' => $row->id,
                'text' => $row->name.' (Slug: '.$row->slug.')',
            ];
        }

        return response()->json($data);
    }

    public function index_data(Datatables $datatable, Request $request)
    {
        $module_name = $this->module_name;
        $query = Page::query();

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
            ->addColumn('action', function ($data) use ($module_name) {
                return view('page::backend.pages.action_column', compact('data'));
            })
            
            ->addColumn('image', function ($data) use ($module_name) {
                return '<img src='.$data->feature_image." class='avatar avatar-50 rounded-pill'>";
             })
            ->editColumn('status', function ($row) {
                $checked = '';
                if ($row->status) {
                    $checked = 'checked="checked"';
                }

                return '
                <div class="form-check form-switch ">
                    <input type="checkbox" data-url="'.route('backend.pages.update_status', $row->id).'" data-token="'.csrf_token().'" class="switch-status-change form-check-input"  id="datatable-row-'.$row->id.'"  name="status" value="'.$row->id.'" '.$checked.'>
                </div>
               ';
            })
            ->editColumn('updated_at', function ($data) {

                $diff = Carbon::now()->diffInHours($data->updated_at);

                if ($diff < 25) {
                    return $data->updated_at->diffForHumans();
                } else {
                    return $data->updated_at->isoFormat('llll');
                }
            })
            ->orderColumns(['id'], '-:column $1');

        return $datatable->rawColumns(array_merge(['action', 'status', 'check','image']))
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $module_action = 'Create';

        return view('page::backend.pages.create', compact('module_action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        // Prepare the data excluding the 'feature_image'
        $data = $request->except('feature_image');
    
        // Create the Page record
        $page = Page::create($data);
    
        // Handle the 'feature_image' file upload if it exists
        if ($request->hasFile('feature_image')) {
            storeMediaFile($page, $request->file('feature_image'));
        }
    
        // Prepare a success message
        $message = __('messages.create_form', ['form' => __($this->module_title)]);
    
        // Return a JSON response
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

        $data = Page::findOrFail($id);

        return view('page::backend.pages.show', compact('module_action', "$data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = Page::findOrFail($id);

        return response()->json(['data' => $data, 'status' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // Find the page by ID
        $data = Page::findOrFail($id);
         // Dump the request data and the existing page data
    // dd([
    //     'id' => $id,
    //     'request_data' => $request->all(),  // All data sent from the frontend
    //     'existing_data' => $data->toArray(),  // Existing data of the page from the database
    // ]);

        // Extract all request data except 'feature_image'
        $request_data = $request->except('feature_image');
    
        // Update the page data
        $data->update($request_data);
    
        // Handle image upload if a file is provided
        if ($request->hasFile('feature_image')) {
            storeMediaFile($data, $request->file('feature_image'), 'feature_image');
        }
    
        // Prepare success message
        $message = __('messages.update_form', ['form' => __($this->module_title)]);
    
        // Return JSON response
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
        $data = Page::findOrFail($id);

        $data->delete();

        $message = __('messages.delete_form', ['form' => __($this->module_title)]);

        return response()->json(['message' => $message, 'status' => true], 200);
    }

    /**
     * List of trashed ertries
     * works if the softdelete is enabled.
     *
     * @return Response
     */
    public function trashed()
    {
        $module_name = $this->module_name;

        $module_name_singular = Str::singular($module_name);

        $module_action = 'Trash List';

        $data = Page::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate();

        return view('page::backend.pages.trash', compact("$data", 'module_name_singular', 'module_action'));
    }

    /**
     * Restore a soft deleted entry.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $module_action = 'Restore';

        $data = Page::withTrashed()->find($id);
        $data->restore();

        $message = Str::singular(Pages).'Data Restoreded Successfully !';

        return response()->json(['message' => $message, 'status' => true], 200);
    }

    public function update_status(Request $request, Page $id)
    {
        $id->update(['status' => $request->status]);

        return response()->json(['status' => true, 'message' => __('branch.status_update')]);
    }

    public function bulk_action(Request $request)
    {
        $ids = explode(',', $request->rowIds);

        $actionType = $request->action_type;

        $message = __('messages.bulk_update');

        switch ($actionType) {
            case 'change-status':
                $branches = Page::whereIn('id', $ids)->update(['status' => $request->status]);
                $message = __('messages.bulk_category_update');
                break;

            case 'delete':
                if (env('IS_DEMO')) {
                    return response()->json(['message' => __('messages.permission_denied'), 'status' => false], 200);
                }
                Page::whereIn('id', $ids)->delete();
                $message = __('messages.bulk_category_update');
                break;

            default:
                return response()->json(['status' => false, 'message' => __('branch.invalid_action')]);
                break;
        }

        return response()->json(['status' => true, 'message' => __('messages.bulk_update')]);
    }
}
