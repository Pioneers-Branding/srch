<?php

namespace Modules\ShopProduct\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Modules\ShopCategory\Models\ShopCategory;
use Modules\CustomField\Models\CustomField;
use Modules\CustomField\Models\CustomFieldGroup;
use Modules\ShopProduct\Models\ShopProduct;
use Yajra\DataTables\DataTables;

class ShopProductController extends Controller
{
    // use Authorizable;
    protected string $exportClass = '\App\Exports\ServicesExport';

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Shop Products';
        // module name
        $this->module_name = 'shopproduct'; 

        // module icon
        $this->module_icon = 'fa-solid fa-clipboard-list';

        view()->share([
            'module_title' => $this->module_title,
            'module_icon' => $this->module_icon,
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
        $module_action = 'List';
        $columns = CustomFieldGroup::columnJsonValues(new ShopProduct());
        $customefield = CustomField::exportCustomFields(new ShopProduct());

        $categories = ShopCategory::where('status' , 1)->get();

        $export_import = true;
        $export_columns = [
            [
                'value' => 'name',
                'text' => ' Name',
            ],
            [
                'value' => 'default_price',
                'text' => 'Default Price',
            ],
            [
                'value' => 'duration_min',
                'text' => 'Duration Min',
            ],
            [
                'value' => 'category',
                'text' => 'Category',
            ],
            [
                'value' => 'branches',
                'text' => 'Branches Count',
            ],
            [
                'value' => 'employees',
                'text' => 'Employee Count',
            ],
            [
                'value' => 'status',
                'text' => 'Status',

            ],
        ];
        $export_url = '';

        return view('shopproduct::backend.product.index_datatable', compact('module_action', 'filter', 'categories', 'columns', 'customefield', 'export_import', 'export_columns', 'export_url'));
    }

    /**
     * Select Options for Select 2 Request/ Response.
     *
     * @return Response
     */
    public function category_list(Request $request)
    {
       
        $data = ShopCategory::query();

        $data = $data->get();

        return response()->json($data);
    }

    /* category wise service list */
    public function categort_product_list(Request $request)
    {
        $category = $request->category_id;
        $categoryProducts = ShopProduct::where('category_id', $category)->get();

        return $categoryProducts;
    }
    
    public function update_status(Request $request, ShopProduct $id)
    {
        $id->update(['status' => $request->status]);

        return response()->json(['status' => true, 'message' => __('branch.status_update')]);
    }

    public function index_data(Datatables $datatable, Request $request)
    {
        $module_name = $this->module_name;
        $query = ShopProduct::query()
            ->with(['category']);

        $filter = $request->filter;

        if (isset($filter)) {
            if (isset($filter['column_status'])) {
                $query->where('status', $filter['column_status']);
            }
        }
        if (isset($filter)) {
            if (isset($filter['category_id'])) {
                $query->where('category_id', $filter['category_id']);
            }
        }

        $datatable = $datatable->eloquent($query)
            ->addColumn('check', function ($data) {
                return '<input type="checkbox" class="form-check-input select-table-row"  id="datatable-row-'.$data->id.'"  name="datatable_ids[]" value="'.$data->id.'" onclick="dataTableRowCheck('.$data->id.')">';
            })
            ->addColumn('image', function ($data) {
                return '<img src='.$data->feature_image." class='avatar avatar-50 rounded-pill'>";
            })
            ->addColumn('action', function ($data) use ($module_name) {
                return view('shopproduct::backend.product.action_column', compact('module_name', 'data'));
            })
            ->editColumn('default_price', function ($data) {
                return \Currency::format($data->default_price);
            })
            ->editColumn('status', function ($row) {
                $checked = '';
                if ($row->status) {
                    $checked = 'checked="checked"';
                }

                return '
                    <div class="form-check form-switch ">
                        <input type="checkbox" data-url="'.route('backend.shopproduct.update_status', $row->id).'" data-token="'.csrf_token().'" class="switch-status-change form-check-input"  id="datatable-row-'.$row->id.'"  name="status" value="'.$row->id.'" '.$checked.'>
                    </div>
                ';
            })
            ->editColumn('category_id', function ($data) {
                $category = isset($data->category->name) ? $data->category->name : '-';
                return $category;
            })
            ->filterColumn('category', function ($query, $keyword) {
                $query->whereHas('category', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', '%'.$keyword.'%');
                });
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

            ->orderColumns(['id'], '-:column $1');

        // Custom Fields For export
        $customFieldColumns = CustomField::customFieldData($datatable, ShopProduct::CUSTOM_FIELD_MODEL, null);

        return $datatable->rawColumns(array_merge(['action', 'image', 'status', 'check'], $customFieldColumns))
            ->toJson();
    }

    public function index_list_data(Request $request)
    {

        $term = trim($request->q);

        $query_data = User::role('employee')->where(function ($q) {
            if (! empty($term)) {
                $q->orWhere('name', 'LIKE', "%$term%");
            }
        })->get();

        $data = [];

        foreach ($query_data as $row) {
            $data[] = [
                'id' => $row->id,
                'name' => $row->first_name.$row->last_name,
                'avatar' => $row->profile_image,
            ];
        }

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
 
        $data = $request->except('feature_image');

        if(!empty($request->id))
        {
            $query = ShopProduct::findOrFail($request->id);

            $query->update($data);

        }else
        {
           $query = ShopProduct::create($data);
        }

        if ($request->custom_fields_data) {

            $query->updateCustomFieldData(json_decode($request->custom_fields_data));
        }

        storeMediaFile($query, $request->file('feature_image'));

        $message = __('messages.create_form', ['form' => __('service.singular_title')]);

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

        $data = ShopProduct::findOrFail($id);

        return view('shopproduct::backend.product.show', compact('module_action', "$data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = ShopProduct::with('media')->where('id' , $id)->first();

        if (! is_null($data)) {
            $custom_field_data = $data->withCustomFields();
            $data['custom_field_data'] = collect($custom_field_data->custom_fields_data)
                ->filter(function ($value) {
                    return $value !== null;
                })
                ->toArray();
         $data->feature_image = $data->feature_image;
        }

     
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
        $data = ShopProduct::findOrFail($id);

        $request_data = $request->except('feature_image');

        $data->update($request_data);

        if ($request->custom_fields_data) {

            $data->updateCustomFieldData(json_decode($request->custom_fields_data));
        }

        storeMediaFile($data, $request->file('feature_image'), 'feature_image');

        $message = __('messages.update_form', ['form' => __('service.singular_title')]);

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

        $data = ShopProduct::findOrFail($id);

        $data->delete();

        $message = __('messages.delete_form', ['form' => __('shopproduct')]);

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
        $module_name_singular = Str::singular($this->module_name);

        $module_action = 'Trash List';

        $data = ShopProduct::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate();

        return view('service::backend.services.trash', compact("$data", 'module_name_singular', 'module_action'));
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
        $data = ShopProduct::withTrashed()->find($id);
        $data->restore();

        $message = __('messages.service_data');

        return response()->json(['message' => $message, 'status' => true]);
    }

}
