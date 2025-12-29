<?php

namespace Modules\ShopCategory\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ShopCategory\Models\ShopCategory;
use Modules\ShopCategory\Transformers\CategoryResource;

class ShopCategoryController extends Controller
{
    public function __construct()
    {
    }

    public function categoryList(Request $request)
    {

        $category = ShopCategory::with('media')->where('status', 1)->get();
        
        foreach ($category as $list) {
            
            $list->category_image = $list->feature_image;
        }
        
        return response()->json([
            'status' => true,
            'data' => $category,
            'message' => __('category.category_list'),
        ], 200);
    }

    public function categoryDetails(Request $request)
    {

        $categoryId = $request->category_id;

        $category = ShopCategory::find($categoryId);
        
        if ($category) {
            
            $category->category_image = $category->feature_image;
            
            return response()->json(['status' => true, 'data' => $category, 'message' => __('category.category_detail')]);
        } else {
            return response()->json(['status' => false, 'message' => __('category.category_notfound')]);
        }
    }


}
