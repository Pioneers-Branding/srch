<?php

namespace Modules\ProductBooking\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\ProductBooking\Models\Wishlist;


class WishlistController extends Controller
{

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Wishlist';
    }


public function addToWishlist(Request $request)
    {
        if (empty($request->product_id)) {
            
            return response()->json(['status' => false , 'message' => 'product_id field is required'], 200);
        }
        
        $user = auth()->user(); 

        $wishlistItem = Wishlist::where('user_id', $user->id)->where('product_id', $request->input('product_id'))->first();

        if (!$wishlistItem) {
            Wishlist::create([
                'user_id' => $user->id,
                'product_id' => $request->input('product_id'),
            ]);

            return response()->json(['status' => true ,'message' => 'Product added to wishlist'], 200);
        }

        return response()->json(['status' =>  false ,'message' => 'Product already in wishlist'], 200);
    }

    /**
     * Remove a product from the wishlist.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function removeFromWishlist(Request $request)
    {
        
        if (empty($request->product_id)) {
            
            return response()->json(['status' => false ,'message' => 'product_id field is required'], 200);
        }
        
        $user = auth()->user();
        
        $product_id = $request->product_id;

        $wishlistItem = Wishlist::where('user_id', $user->id)->where('product_id', $product_id)->first();

        if ($wishlistItem) {
            $wishlistItem->delete();

            return response()->json([ 'status' => true, 'message' => 'Product removed from wishlist'], 200);
        }

        return response()->json([ 'status' => false , 'message' => 'Product not found in wishlist'], 200);
    }

    /**
     * Get the user's wishlist.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function getWishlist()
    {
        $user = auth()->user();

        $wishlist = Wishlist::where('user_id', $user->id)->with('product')->get();

        return response()->json(['wishlist' => $wishlist], 200);
    }




}


?>