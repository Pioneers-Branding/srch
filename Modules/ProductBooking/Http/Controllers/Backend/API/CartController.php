<?php

namespace Modules\ProductBooking\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\ProductBooking\Models\Cart;
use Modules\ShopProduct\Models\ShopProduct;
use App\Models\User;


class CartController extends Controller
{

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Cart';
    }


    public function addToCart(Request $request)
    {
        
        if (empty($request->product_id)) {
            
            return response()->json(['status' => false , 'message' => 'product_id field is required'], 200);
        }
        
        if (empty($request->quantity)) {
            
            return response()->json(['status' => false , 'message' => 'quantity field is required'], 200);
        }
        
        $user_id =  ! empty($request->user_id) ? $request->user_id : auth()->user()->id;

        $cartItem = Cart::where('user_id', $user_id)->where('product_id', $request->input('product_id'))->first();

        if (!$cartItem) {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $request->input('product_id'),
                'quantity' => $request->input('quantity'),
            ]);

            return response()->json(['status' => true, 'message' => 'Product added to cart'], 200);
        }

        $cartItem->update([
            'quantity' => $request->input('quantity'),
        ]);

        return response()->json(['status' => true , 'message' => 'Product quantity updated in cart'], 200);
    }

    /* Remove a product from the cart.*/
    
    public function removeFromCart(Request $request)
    {
        
        if (empty($request->product_id)) {
            
            return response()->json(['status' => false ,'message' => 'product_id field is required'], 200);
        }
        
        $user_id =  ! empty($request->user_id) ? $request->user_id : auth()->user()->id ;
        
        $product_id = $request->product_id;

        $cartItem = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($cartItem) {
            $cartItem->delete();

            return response()->json([ 'status' => true , 'message' => 'Product removed from cart'], 200);
        }

        return response()->json(['status' => false ,'message' => 'Product not found in cart'], 200);
    }

    /**
     * Get the user's shopping cart.
     *
     * @return \Illuminate\Http\Response
     */
    //  old code date 6/03/2025
//   public function getCart(Request $request)
//   {
//     $user_id = !empty($request->user_id) ? $request->user_id : auth()->user()->id;
//     $user = User::find($user_id);
//     $cart = Cart::where('user_id', $user_id)->orderByDesc('id')->get();

//     $is_vendor = $user && $user->is_manager;
//     $relationship = $is_vendor ? 'service' : 'product';
//     $cart->load($relationship);

//     foreach ($cart as $item) {
//         $imageField = $is_vendor ? 'service_image' : 'product_image';
//         $item->{$relationship}->{$imageField} = $item->{$relationship}->feature_image;
//     }
//     $sub_total = 0;
//     $items = [];
//     if (!$is_vendor) {
//         $items = $cart->map(function ($item) use (&$sub_total) {
//             $sub_total += ($item->product->default_price * $item->quantity);
//             return [
//                 'id' => $item->product->id,
//                 'quantity' => $item->quantity,
//                 'category_id' => $item->product->category_id,
//                 'sub_category_id' => $item->product->sub_category_id,
//                 'child_category_id' => $item->product->child_category_id,
//                 'slug' => $item->product->slug,
//                 'name' => $item->product->name,
//                 'description' => $item->product->description,
//                 'duration_min' => $item->product->duration_min,
//                 'default_price' => $item->product->default_price,
//                 'product_image' => $item->product->product_image,
//                 'status' => $item->product->status,
//                 'created_at' => $item->created_at,
//                 'updated_at' => $item->updated_at,
//                 'created_by' => $item->created_by,
//                 'updated_by' => $item->updated_by,
//             ];
//         })->values()->toArray();  // Remove numeric indices
//     }

//     return response()->json([
//         'status' => true,
//         'data' => [
//             'items' => $items,
//             'sub_total' => $sub_total,
//         ],
//         'message' => 'Cart List'
//     ], 200);
// }



public function getCart(Request $request)
{
    $user_id = !empty($request->user_id) ? $request->user_id : auth()->user()->id;
    $user = User::find($user_id);
    $cart = Cart::where('user_id', $user_id)->orderByDesc('id')->get();

    $is_vendor = $user && $user->is_manager;

    // Load both relationships
    $cart->load(['product', 'service']);

    foreach ($cart as $item) {
        if ($is_vendor && $item->service) {
            $item->service->service_image = $item->service->feature_image;
        } elseif (!$is_vendor && $item->product) {
            $item->product->product_image = $item->product->feature_image;
        }
    }

    $sub_total = 0;
    $items = [];

    $items = $cart->map(function ($item) use (&$sub_total, $is_vendor) {
        if ($is_vendor && $item->service) {
            $sub_total += ($item->service->default_price * $item->quantity);
            return [
                'id' => $item->service->id,
                'quantity' => $item->quantity,
                'category_id' => $item->service->category_id,
                'sub_category_id' => $item->service->sub_category_id,
                'child_category_id' => $item->service->child_category_id,
                'slug' => $item->service->slug,
                'name' => $item->service->name,
                'description' => $item->service->description,
                'duration_min' => $item->service->duration_min,
                'default_price' => $item->service->default_price,
                'product_image' => $item->service->service_image, // keep same key for frontend
                'status' => $item->service->status,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'created_by' => $item->created_by,
                'updated_by' => $item->updated_by,
            ];
        } elseif (!$is_vendor && $item->product) {
            $sub_total += ($item->product->default_price * $item->quantity);
            return [
                'id' => $item->product->id,
                'quantity' => $item->quantity,
                'category_id' => $item->product->category_id,
                'sub_category_id' => $item->product->sub_category_id,
                'child_category_id' => $item->product->child_category_id,
                'slug' => $item->product->slug,
                'name' => $item->product->name,
                'description' => $item->product->description,
                'duration_min' => $item->product->duration_min,
                'default_price' => $item->product->default_price,
                'product_image' => $item->product->product_image,
                'status' => $item->product->status,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'created_by' => $item->created_by,
                'updated_by' => $item->updated_by,
            ];
        }

        return null; // fallback if neither exists
    })->filter()->values()->toArray();  // Remove nulls and numeric indices

    return response()->json([
        'status' => true,
        'data' => [
            'items' => $items,
            'sub_total' => $sub_total,
        ],
        'message' => 'Cart List'
    ], 200);
}

}


?>