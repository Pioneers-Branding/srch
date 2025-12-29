<?php

namespace Modules\ShopProduct\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ShopCategory\Models\ShopCategory;
use Modules\ShopProduct\Models\ShopProduct;


class ShopProductController extends Controller
{


    public function ProductList(Request $request)
    {

        $shopProduct = ShopProduct::with(['media']);
    
        if ($request->has('search')) {
            $shopProduct->where('name', 'like', "%{$request->search}%");
        }

        if ($request->has('category_id') && $request->category_id != '') {
            
            $shopProduct = $shopProduct->Where('category_id', $request->category_id);
        }
        
        $shopProduct = $shopProduct->get();
        // dd($shopProduct);
        
        foreach ($shopProduct as $list) {
            
            $list->product_image = $list->feature_image;
        }

        return response()->json([
            'status' => true,
            'data' => $shopProduct,
            'message' => __('Shop Propduct List'),
        ], 200);
    }

    public function productDetail(Request $request)
    {
        // dd($request->all());
    // Initialize the product query with necessary relationships
    $product = ShopProduct::where('status', 1)->with(['category', 'media']);
    
    // Apply filters based on the request
    if ($request->has('product_id')) {
        $product->where('id', $request->product_id);
    }

    if ($request->has('name')) {
        $keyword = $request->input('name');
        $product->where('name', 'LIKE', '%'.$keyword.'%');
    }
    
    // Get the first matching product
    $filteredProducts = $product->first();
    
    if (empty($filteredProducts)) {
        return response()->json(['status' => false, 'message' => __('Shop Product not found')]);
    } else {
        // Attach the feature image URL to the product
        $filteredProducts->product_image = $filteredProducts->media->first() ? $filteredProducts->media->first()->original_url : null;
        
        // Attach the category feature image URL to the category
        if ($filteredProducts->category) {
            $filteredProducts->category->category_image = $filteredProducts->category->media->first() ? $filteredProducts->category->media->first()->original_url : null;
        }

        // Return the response
        return response()->json([
            'status' => true,
            'data' => $filteredProducts,
            'message' => __('Shop Product Detail')
        ], 200);
    }
}


}
