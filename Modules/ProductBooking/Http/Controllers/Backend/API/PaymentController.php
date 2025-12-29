<?php

namespace Modules\ProductBooking\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ProductBooking\Models\Order;
use Modules\ProductBooking\Models\OrderTransaction;
use Modules\ProductBooking\Trait\PaymentTrait;
use Modules\Commission\Models\CommissionEarning;
use Modules\Tip\Models\TipEarning;

class PaymentController extends Controller
{
    use PaymentTrait;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Payment';
    }

    public function savePayment(Request $request)
    {
        $data = $request->all();
        $data['tip_amount'] = $data['tip'] ?? 0;

        $order = Order::where('id', $data['order_id'])->first();

        $payment = OrderTransaction::create($data);

        $message = __('Order Payment successfully');

        return response()->json(['message' => $message, 'status' => true], 200);
    }
}
