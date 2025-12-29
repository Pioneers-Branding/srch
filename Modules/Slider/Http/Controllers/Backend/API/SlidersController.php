<?php

namespace Modules\Slider\Http\Controllers\Backend\API;

use App\Authorizable;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Constant\Models\Constant;
use Modules\Category\Models\Category;
use Modules\CustomField\Models\CustomFieldGroup;
use Modules\Slider\Http\Requests\SliderRequest;
use Modules\Slider\Models\Slider;


class SlidersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function sliderList(Request $request)
    {
        
        if (empty($request->banner_for)) {
            
            return response()->json([
            'status' => false,
            'data' => [],
            'message' => __('banner_for is required field'),
            ], 200);
        }
        
        $sliders = Slider::where('status' , 1)->where('banner_type' , $request->banner_for)->get(); 
        
        $responseData = [];
        
        foreach ($sliders as $k=>$list) {
            
             
            $responseData[$k]['id'] = $list->id;
            $responseData[$k]['link_id'] = $list->link_id;
            $responseData[$k]['sub_id'] = $list->sub_id;
            $responseData[$k]['banner_type'] = $list->banner_type;
            $responseData[$k]['slider_image'] = $list->feature_image;
            $responseData[$k]['category'] = $list->link_id!==null ? $list->module :  null ;
        }
        
        return response()->json([
            'status' => true,
            'data' => $responseData,
            'message' => __('Banner list'),
        ], 200);
    }

}
