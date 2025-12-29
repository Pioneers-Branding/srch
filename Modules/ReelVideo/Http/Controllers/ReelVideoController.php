<?php

namespace Modules\ReelVideo\Http\Controllers;

use App\Authorizable;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Constant\Models\Constant;
use Modules\CustomField\Models\CustomFieldGroup;
use Modules\ReelVideo\Models\ReelVideo;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\ValidationException;

class ReelVideoController extends Controller
{
    // use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Chess Trivia';

        // module name
        $this->module_name = 'videos';

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
        $module_action = 'List';

        $filter = [
            'status' => $request->status,
        ];
        $columns = CustomFieldGroup::columnJsonValues(new ReelVideo());
        $module_action = 'List';

        return view('reelvideo::backend.video.index_datatable', compact('module_action', 'filter', 'columns'));
    }

    /**
     * Select Options for Select 2 Request/ Response.
     *
     * @return Response
     */
    public function index_list(Request $request)
    {
        
        $data = [];

        return response()->json($data);
    }

    public function index_data(Datatables $datatable, Request $request)
    {
        $module_name = $this->module_name;
        $query = ReelVideo::query();
        $filter = $request->filter;

        if (isset($filter)) {
            if (isset($filter['column_status'])) {
                $query->where('status', $filter['column_status']);
            }
        }

        $datatable = $datatable->eloquent($query)
            ->addColumn('check', function ($row) {
                return '<input type="checkbox" class="form-check-input select-table-row "  id="datatable-row-'.$row->id.'"  name="datatable_ids[]" value="'.$row->id.'" onclick="dataTableRowCheck('.$row->id.')">';
            })
           
            ->addColumn('question', function ($row) {
                return $row->question; // Ensure this field exists in your model
            })
            ->addColumn('options', function ($row) {
                $options = !empty($row->options) ? $row->options : []; // Assuming 'options' is a JSON string
                return implode(', ', $options); // Convert array to comma-separated string
            })
            ->addColumn('correct_answer', function ($row) {
             
                return isset($row->options[$row->correct_answer]) ?  $row->options[$row->correct_answer] :''; // Ensure this field exists in your model
            })
            ->addColumn('action', function ($data) use ($module_name) {
                return view('reelvideo::backend.video.action_column', compact('module_name', 'data'));
            })
            ->editColumn('status', function ($row) {
                $checked = $row->status ? 'checked="checked"' : '';

                return '
                    <div class="form-check form-switch">
                        <input type="checkbox" data-url="'.route('backend.videos.update_status', $row->id).'" data-token="'.csrf_token().'" class="switch-status-change form-check-input" id="datatable-row-'.$row->id.'" name="status" value="'.$row->id.'" '.$checked.'>
                    </div>
                ';
            })
           
            ->editColumn('updated_at', function ($data) {
                $diff = Carbon::now()->diffInHours($data->updated_at);
                return $diff < 25 ? $data->updated_at->diffForHumans() : $data->updated_at->isoFormat('llll');
            })
            ->orderColumns(['id'], '-:column $1');

        return $datatable->rawColumns(array_merge(['action', 'status', 'check', 'video', 'thumbnail']))
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
        
        $data = $request->except('video');


        $data['options'] = !empty($data['options']) ? json_encode(explode(',', $data['options'])) : [];
    

        if (!empty($request->id)) {

            $query = ReelVideo::where('id' ,$request->id)->first();
            $query->update($data);

            $message = __('messages.create_form', ['form' => __($this->module_title)]);

        }else { 
            $query = ReelVideo::create($data);

            $message = __('messages.update_form', ['form' => __($this->module_title)]);
        }
    
        if ($request->hasFile('video')) {
            
          $query->clearMediaCollection('video');

          $query->addMedia($request->file('video'))->toMediaCollection('video');
        }

        if ($request->hasFile('thumbnail')) {
        
         $query->clearMediaCollection('thumbnail');
         $query->addMedia($request->file('thumbnail'))->toMediaCollection('thumbnail') ;

        }

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

        $data = Slider::findOrFail($id);

        return view('reelvideo::backend.video.show', compact('module_action', "$data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $module_action = 'Edit';

        $data = ReelVideo::findOrFail($id);

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
        $query = ReelVideo::findOrFail($id);
        $data = $request->except('video');
        $data['options'] = !empty($data['options']) ? json_encode(explode(',', $data['options'])) : [];
    

        $query->update($data);

        $message = Str::singular($this->module_title).' Updated Successfully';

        if ($request->hasFile('video')) {
            
            $query->clearMediaCollection('video');
  
            $media = $query->addMedia($request->file('video'))->toMediaCollection('video');

          }
  
          if ($request->hasFile('thumbnail')) {
          
           $query->clearMediaCollection('thumbnail');
           $query->addMedia($request->file('thumbnail'))->toMediaCollection('thumbnail') ;
  
          }

        $message = __('messages.update_form', ['form' => __($this->module_title)]);

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

        $data = ReelVideo::findOrFail($id);

        $data->delete();

        $message = __('messages.delete_form', ['form' => __('slider.singular_title')]);

        return response()->json(['message' => $message, 'status' => true], 200);
    }

    public function restore($id)
    {
        $module_action = 'Restore';

        $data = ReelVideo::withTrashed()->find($id);
        $data->restore();

        return redirect('app/videos');
    }

    public function update_status(Request $request, ReelVideo $id)
    {
        $id->update(['status' => $request->status]);

        return response()->json(['status' => true, 'message' => __('branch.status_update')]);
    }

    
}
