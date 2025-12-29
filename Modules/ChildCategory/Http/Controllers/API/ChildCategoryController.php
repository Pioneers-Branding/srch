<?php

namespace Modules\ChildCategory\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ChildCategory\Models\ChildCategory;
use Modules\ChildCategory\Transformers\CategoryResource;

use Validator;

class ChildCategoryController extends Controller
{
    public function __construct()
    {
    }

    public function childCategoryList(Request $request)
    {

        $subcategories = ChildCategory::with('media')->latest();
        
        foreach ($subcategories as $list) {
            $list->category_image = $list->media->original_url;
        }
        
        
        return response()->json([
            'status' => true,
            'data' => $subcategories,
            'message' => __('category.subcategory_list'),
        ], 200);
    }

    public function childCategoryBySubId(Request $request)
    {
        $validation = Validator::make($request->all(),[ 
            'sub_category_id' => 'required',
        ]);
    
        if($validation->fails()){
    
         return response()->json(['status' => false, 'message' => $validation->messages() ]);
    
        }
        
        $sub_category_id = $request->input('sub_category_id');

        $subcategories = ChildCategory::with('media')->where('status' , 1);
        
        if(!empty($sub_category_id))
        {
            $subcategories->where('sub_id' , $sub_category_id);
            
        }
        
       $subcategories = $subcategories->get();
       
       foreach ($subcategories as $list) {
           
            $list->category_image = $list->feature_image;
        }

        if ($subcategories->count() > 0) {
            return response()->json(['status' => true, 'data' => $subcategories, 'message' => __('child category list by sub category')]);
        } else {
            return response()->json(['status' => false, 'message' => __('child category not found')]);
        }
    }
}
