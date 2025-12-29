<?php


namespace Modules\Coupon\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Coupon\Models\Coupon;
use Modules\CouponResource\Transformers\CouponResource;

class CouponsController extends Controller
{
    
    /**
     * Apply a coupon code and calculate the discounted price and discount amount.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function applyCoupon(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'coupon_code' => 'required|string',
            'amount' => 'required|numeric', // Total amount before discount
        ]);

        // Retrieve the coupon from the database based on the provided coupon code
        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return response()->json([
                'status' => false,
                'message' => 'Coupon not found.',
            ], 404);
        }

        // Calculate the discounted price and discount amount based on the coupon type
        $discountInfo = $this->calculateDiscount($request->amount, $coupon);

        // Return the discounted price and discount amount
        return response()->json([
            'status' => true,
            'discounted_price' => $discountInfo['discounted_price'],
            'discount_amount' => $discountInfo['discount_amount'],
            'message' => 'Coupon applied successfully.',
        ], 200);
    }

    /**
     * Calculate the discounted price and discount amount based on the coupon type.
     *
     * @param float $amount
     * @param Coupon $coupon
     * @return array
     */
    private function calculateDiscount($amount, $coupon)
    {
        $discountedPrice = 0;
        $discountAmount = 0;

        if ($coupon->type === 'fixed') {
            // Calculate discounted price and discount amount for fixed amount coupon
            $discountAmount = min($coupon->value, $amount); // Ensure the discount amount does not exceed the total amount
            $discountedPrice = max($amount - $discountAmount, 0); // Ensure the discounted price is not negative
        } elseif ($coupon->type === 'percent') {
            // Calculate discounted price and discount amount for percentage discount coupon
            $discountAmount = min($amount * ($coupon->value / 100), $amount); // Ensure the discount amount does not exceed the total amount
            $discountedPrice = $amount - $discountAmount;
        }

        return [
            'discounted_price' => $discountedPrice,
            'discount_amount' => $discountAmount,
        ];
    }
}

