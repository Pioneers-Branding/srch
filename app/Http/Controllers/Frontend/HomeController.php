<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Mail\MailMailableSend;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Modules\Blog\Models\Blog;
use Modules\Page\Models\Page;
use Modules\Slider\Models\Slider;
use Modules\Category\Models\Category;
use Modules\Service\Models\Service;
use Modules\ShopProduct\Models\ShopProduct;
use Modules\ShopCategory\Models\ShopCategory;
use Modules\ReelVideo\Models\ReelVideo;
use Modules\Coupon\Models\Coupon;
use Session;
use App\Helpers\CommonHelper;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = Blog::where('status' , 1)->latest()->get();
        $banners = Slider::where('status', 1)
                     ->where('banner_type', 'top')
                     ->latest()
                     ->get();
       
        return view('frontend.index' ,compact('blogs','banners'));
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function coaches_details()
    {
        return view('frontend.coaches_details');
    }
    public function servicecheckout()
    {
        return view('frontend.service-checkout');
    }
    public function chess_trivia()
    {
        $quizes = ReelVideo::inRandomOrder()->limit(10)->get();
        $coupon = Coupon::inRandomOrder()->first();
        return view('frontend.chess_trivia', compact('quizes', 'coupon'));
    }
    
  

    public function stress_test_parents()
    {
        return view('frontend.stress_test_parents');
    }
    public function stress_test_children()
    {
        return view('frontend.stress_test_children');
    }
    public function Chesscofee($category_slug = null)
    {
    // Fetch the category with "Chess Coffee Connect" name or the specified category slug
       $category = $category_slug 
        ? Category::where('status', 1)->where('slug', $category_slug)->first() 
        : Category::where('status', 1)->where('name', 'Chess Coffee Connect')->first();

    // Fetch subcategories only if a category exists
    $subcategories = $category ? Category::where('status', 1)->where('parent_id', $category->id)->get() : collect();

    $where = [];
    if ($category) {
        $where['category_id'] = $category->id;
    }

    // Fetch services with status 1, belonging to "Chess Coffee Connect" category, ordered by latest
    $services = Service::where('status', 1)->where($where)->latest()->get();

    return view('frontend.chess-coffee-connect', compact('services', 'category', 'subcategories'));
   }

   public function workshops($category_slug = null, $sub_category_slug = null)
   {
       // Fetch the category based on the provided category slug or default to "Corporate and School workshops"
       $category = $category_slug 
           ? Category::where('status', 1)->where('slug', $category_slug)->first() 
           : Category::where('status', 1)->where('name', 'Corporate and School workshops')->first();
   
       // Fetch subcategories only if the main category exists
       $subcategories = $category ? Category::where('status', 1)->where('parent_id', $category->id)->get() : collect();
   
       $where = [];
       if ($category) {
           $where['category_id'] = $category->id;
       }
   
       if ($sub_category_slug) {
           $sub = Category::where('status', 1)->where('slug', $sub_category_slug)->first();
           if ($sub) {
               $where['sub_category_id'] = $sub->id;
               $subcategories = collect(); // Clear subcategories if a specific subcategory is selected
           }
       }
   
       // Fetch services with status 1 and matching category/subcategory criteria, ordered by latest
       $services = Service::where('status', 1)->where($where)->latest()->get();
   
       return view('frontend.workshops', compact('services', 'category', 'subcategories'));
   }
   
    
    public function service($category_slug = null, $sub_category_slug = null)
    {
    
    $category = $category_slug ? Category::where('status', 1)->where('slug',$category_slug )->first() : null;

    
    $subcategories = $category_slug ? Category::where('status', 1)->where('parent_id', $category->id)->get() : collect();

    $where = [];
    if ($category_slug) {
        $where['category_id'] = $category->id;
    }
    $sub = null;
    if ($sub_category_slug) {
        $sub = Category::where('status', 1)->where('slug',$sub_category_slug )->first();
        $where['sub_category_id'] = $sub->id;
        $subcategories = collect();
    }

   
    $services = Service::where('status', 1)->where($where)->latest()->get();

    return view('frontend.workshops', compact('services', 'category', 'subcategories', 'sub'));
   }

    
   public function chessconsultation($category_slug = null)
   { 
       
       // Fetch the category with "Chess Consultation" name or the specified category slug
       $category = $category_slug 
           ? Category::where('status', 1)->where('slug', $category_slug)->first() 
           : Category::where('status', 1)->where('slug', 'chess-consultation')->first();
       // Fetch subcategories only if a category exists
       $subcategories = $category ? Category::where('status', 1)->where('parent_id', $category->id)->get() : collect();
   
       $where = [];
       if ($category) {
           $where['category_id'] = $category->id;
       }
   
       // Fetch services with status 1, belonging to "Chess Consultation" category, ordered by latest
       $services = Service::where('status', 1)->where($where)->latest()->get();
   
       return view('frontend.chess-consultation', compact('services', 'category', 'subcategories'));
   }
     
    
    public function coaching($category_slug = null){ 
       
       // Fetch the category with "Chess Consultation" name or the specified category slug
       $category = $category_slug 
           ? Category::where('status', 1)->where('slug', $category_slug)->first() 
           : Category::where('status', 1)->where('slug', 'coaching')->first();
       // Fetch subcategories only if a category exists
       $subcategories = $category ? Category::where('status', 1)->where('parent_id', $category->id)->get() : collect();
   
       $where = [];
       if ($category) {
           $where['category_id'] = $category->id;
       }
   
       // Fetch services with status 1, belonging to "Chess Consultation" category, ordered by latest
       $services = Service::where('status', 1)->where($where)->latest()->get();
   
       return view('frontend.coaching', compact('services', 'category', 'subcategories'));
   }
     
    // public function coaching()
    // {
    //     $services = Service::all(); 
    //     return view('frontend.coaching');
    // }
    
    
    
    public function faq()
    {
        return view('frontend.faq');
    }
    
    public function coaches()
    {
        return view('frontend.coaches');
    }
    
    
    public function testimonials()
    {
        return view('frontend.testimonials');
    }
    
    
    
     public function socialMediaManagement()
    {
        return view('frontend.media_management');
    }


    
    public function sitemap()
    {
        return view('frontend.sitemap');
    }
     public function returnrefundpolicy()
    {
        return view('frontend.return-refund-policy');
    }

    public function blog(Request $request)
    {
        $blogs = Blog::where('status' , 1)->latest()->get();
        
        return view('frontend.blog' , compact('blogs'));
    }
    public function gallery(Request $request)
    {

        $pages = ShopCategory::where('status', 1)
                     ->latest()
                     ->get();
        return view('frontend.gallery',compact('pages'));
    }
    
    public function blogDetail($id)
    {
        
        $blog = Blog::where('id' , $id)->first();
        
        return view('frontend.blog_details' , compact('blog'));
        
    }
    

    public function contact(Request $request)
    {
        return view('frontend.contact');
    }
    public function storeContact(Request $request)
{
    $request->validate([
        'fname' => 'required|string|max:255',
        'number' => 'required|numeric',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'contact_message' => 'required|string',
    ]);

    // 📝 Store contact in the database
    $contact = new Contact();
    $contact->fname = $request->fname;
    $contact->number = $request->number;
    $contact->email = $request->email;
    $contact->subject = $request->subject;
    $contact->contact_message = $request->contact_message;
    $contact->save();
    // dd($contact);

    // 📦 Prepare email data
    $data = [
        'name' => $request->fname,
        'email' => $request->email,
        'number' => $request->number,
        'subject' => $request->subject,
        'message' => $request->contact_message,
    ];

    try {
        Mail::to('enquiries.srca@srchessacademy.com')->send(new MailMailableSend((object)['defaultNotificationTemplateMap' => (object)['template_detail' => '
            New Contact Submission:<br>
            Name: [[ name ]]<br>
            Email: [[ email ]]<br>
            Number: [[ number ]]<br>
            Subject: [[ subject ]]<br>
            Message: [[ message ]]<br>
        ']], $data));

        return back()->with('success', 'Your message has been sent!');
    } catch (\Exception $e) {
        return back()->with('error', 'Failed to send message. Please try again.');
    }
   
}

    public function category($category_id)
    {
        return view('frontend.category', compact('category_id'));
    }
    
    // product 
    public function showCategory($category_id)
    {
        return view('frontend.product_category', compact('category_id'));
    }
    
    public function service_details(Request $request)
    {
        return view('frontend.service_details');
    }
    
    public function product_details(Request $request)
    {
        
        return view('frontend.product_details');
    }
    
    public function cart(Request $request)
    {
      return view('frontend.cart');
    }
    public function checkout(Request $request, $id)
    {
        // Decrypt the service ID
        $id = Crypt::decryptString($id);
        $userId = Auth::id();
        $user = User::find($userId);
        $service = Service::find($id);
        $total_amount = $service ? $service->default_price : null;
        // $total_amount = DB::table('cart')->where('cart.user_id', Auth::id())->leftJoin('services as p', 'p.id', '=', 'cart.service_id')->sum('p.default_price');

      return view('frontend.checkout',compact('user', 'service','total_amount','id'));
    }
    
    public function cartCheckout(Request $request)
{
    $userId = Auth::id();
    $user = User::find($userId);

    $cart_items = DB::table('cart')
        ->where('cart.user_id', $userId)
        ->where('cart.deleted_by', NULL)
        ->leftJoin('shop_products as p', 'p.id', '=', 'cart.product_id')
        ->select('p.id', 'p.name', 'p.default_price', 'cart.quantity')
        ->get();

    $total_amount = $cart_items->sum(function($item) {
        return $item->default_price * $item->quantity;
    });
    // dd($total_amount);

    return view('frontend.checkout_cart', compact('user', 'cart_items', 'total_amount'));
}

    public function checkout_coching(Request $request, $title,$price)
    {
        // Decrypt the service ID
        $userId = Auth::id();
        $user = User::find($userId);
        $total_amount = $price;
        return view('frontend.checkout_coching',compact('user','total_amount','title'));
    }

    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');
        $totalAmount = $request->input('total_amount');
        
    
        // Find the coupon in the database
        $coupon = DB::table('coupon_code')
            ->where('code', $couponCode)
            ->where('status', 1) // Active coupons only
            ->first();
    
        if (!$coupon) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid coupon code.',
            ]);
        }
    
        // Calculate the discount
        $discount = 0;
        if ($coupon->type === 'fixed') {
            $discount = $coupon->value;
        } elseif ($coupon->type === 'percent') {
            $discount = ($totalAmount * $coupon->value) / 100;
        }
    
        // Ensure the discount does not exceed the total amount
        $newTotal = max($totalAmount - $discount, 0);
    
        return response()->json([
            'success' => true,
            'message' => "Coupon applied successfully! You've saved ₹" . number_format($discount, 2) . ".",
            'new_total' => $newTotal,
        ]);
    }

    
    
    public function programs(Request $request)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        return view('frontend.programs' ,compact('user'));
    }
    
    public function storeBookingDetails(Request $request)
    {
        DB::table('programs')->insert([
            'user_id' => Auth::id(),
            'firstname' => $request->input('first-name'),
            'lastname' => $request->input('last-name'),
            'streetaddress' => $request->input('street-address'),
            'city' => $request->input('city'),
            'country' => $request->input('county'),
            'postcode' => $request->input('postcode'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'month' => $request->input('month'),
            'amount'=>$request->input('amount'),
            'razorpay_payment_id'=>$request->input('razorpay_payment_id'),
            'razorpay_order_id'=>$request->input('razorpay_order_id'),
            
        ]);
         
        return redirect()->back()->with('success', 'Details saved successfully.');
    }
    
   public function storeCheckoutDetails(Request $request)
   {
    
    $bookingId = DB::table('bookings')->insertGetId([
        'user_id' => Auth::id(), 
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'streetaddress' => $request->input('streetaddress'),
        'city' => $request->input('city'),
        'country' => $request->input('country'),
        'postcode' => $request->input('postcode'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
    ]);

    $cartItems = DB::table('cart')->where('user_id', Auth::id())->get();
     foreach ($cartItems as $item) {
        
     $productPrice = DB::table('shop_products')->where('id', $item->product_id)->value('default_price');

        
        DB::table('booking_services')->insert([
            'booking_id' => $bookingId, 
            'product_id' => $item->product_id, 
            'quantity' => $item->quantity,
            'service_price' => $productPrice, 
        ]);
        
        DB::table('cart')->where('id', $item->id)->delete();
        
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Checkout details saved successfully.');
   }

    
    
    public function programs_description(Request $request)
    {
      return view('frontend.programs_description');
    }
    
    public function enrollnow(Request $request)
    {
      return view('frontend.enroll_now');
    }
    public function privacy(Request $request)
    {
      return view('frontend.privacy');
    }
    public function shipping(Request $request)
    {
      return view('frontend.shipping_policy');
    }
    public function termsconditions(Request $request)
    {
        
      return view('frontend.terms-conditions');
    }
    public function stress_test(Request $request)
    {
      return view('frontend.stress_test');
    }
    
    public function service_booking(Request $request)
    {
        if (!$this->isAuthenticatedUser()) {
            Session::put('cart_modal', 'true');
            return redirect()->route('front.signin');
        }

        return view('frontend.multistep_form');
    }

    public function service_list(Request $request)
    {
        return view('frontend.service_list');
    }
    public function product_list(Request $request)
    {
        if ($request->ajax()) {
    
            $shopProductQuery = ShopProduct::with('media');
            
            if ($request->has('search')) {
                $shopProductQuery->where('name', 'like', "%{$request->search}%");
            }
        
            if ($request->has('category_id') && is_array($request->category_id) && !empty($request->category_id)) {
                $shopProductQuery->whereIn('category_id', $request->category_id);
            }
        
            $products = $shopProductQuery->get();
        
            foreach ($products as $product) {
                $product->product_image = $product->feature_image;
            }
        
            return view('frontend.product_list_filter', compact('products'))->render();
        }
        
        $category = ShopCategory::with('media')->where('status', 1)->get();
        
        foreach ($category as $list) {
            
            $list->category_image = $list->feature_image;
        }

        return view('frontend.product_list', compact('category'));
    }



    public function signup(Request $request)
    {
        return view('frontend.signup');
    }

    public function signin(Request $request)
    {
        return view('frontend.signin');
    }

    public function forgotpassword(Request $request)
    {
        return view('frontend.forgotpassword');
    }

    public function updateprofile(Request $request)
    {
        if (!$this->isAuthenticatedUser()) {
            return redirect()->route('front.signin');
        }

        return view('frontend.updateprofile');
    }

    public function mybooking(Request $request)
    {
        if (!$this->isAuthenticatedUser()) {
            return redirect()->route('front.signin');
        }

        return view('frontend.mybooking');
    }
    public function bookingdetails($id)
    {
        return view('frontend.bookingdetails', compact('id'));
    }

    private function isAuthenticatedUser()
    {
        return auth()->check() && auth()->user()->hasRole('user');
    }
    
    public function get_vendor_lat()
    {   
        $lat = 23.18088;  //this lat long for testing
        $long = 75.78813;
        $vendors = CommonHelper::getVendorsByLatLong($lat , $long);
        
        dd($vendors);
    }
    
    public function paymentView()
    {
        return view('payment');
    }
    
    public function submitPaymentForm(Request $request) 
    {
        $request->validate([
            'amount'=>'required|numeric', 
        ],[
            'amount'=>'Amount is required and must be numeric',
        ]);
    
        $amount = $request->input('amount');
    
        if($amount != '') {
            $merchantId = 'MAKEOVERADONLINE'; 
            $apiKey = '5ee861f1-5d19-4abe-8954-64fc88817fad'; 
            $redirectUrl = route('confirm.phonepe');
            $order_id = uniqid();
    
            $transaction_data = [
                'merchantId' => $merchantId,
                'merchantTransactionId' => $order_id,
                'merchantUserId' => $order_id,
                'amount' => $amount * 100, 
                'redirectUrl' => $redirectUrl,
                'redirectMode' => 'POST',
                'callbackUrl' => $redirectUrl,
                'paymentInstrument' => [
                    'type' => 'PAY_PAGE',
                ]
            ];
    
            $encode = json_encode($transaction_data);
            $payloadMain = base64_encode($encode);
            $salt_index = 1; //key index 1
            $payload = $payloadMain . "/pg/v1/pay" . $apiKey;
            $sha256 = hash("sha256", $payload);
            $final_x_header = $sha256 . '###' . $salt_index;
            $requestPayload = json_encode(['request' => $payloadMain]);
    
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $requestPayload,
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/json",
                    "X-VERIFY: " . $final_x_header,
                    "accept: application/json"
                ],
            ]);
    
            $response = curl_exec($curl);
            $err = curl_error($curl);
    
            curl_close($curl);
    
            if ($err) {
                // Handle cURL error
                echo "cURL Error #:" . $err;
            } else {
                $res = json_decode($response);
    
                if(isset($res->code) && ($res->code == 'PAYMENT_INITIATED')) {
                    $payUrl = $res->data->instrumentResponse->redirectInfo->url;
                    return redirect()->away($payUrl); // Redirect to PhonePe payment page
                } else {
                    // Handle error response
                    echo "<pre>";
                    print_r($res);
                    dd($res);
                }
            }
        } else {
            // Handle case where amount is not provided
        }
    }

    
    public function confirmPayment(Request $request) {
        
        if($request->code == 'PAYMENT_SUCCESS')
        {
            $transactionId = $request->transactionId;
            $merchantId=$request->merchantId;
            $providerReferenceId=$request->providerReferenceId;
            $merchantOrderId=$request->merchantOrderId;
            $checksum=$request->checksum;
            $status=$request->code;
           
           //Transaction completed, You can add transaction details into database
    
    
           $data = [
                'providerReferenceId' => $providerReferenceId,
                'checksum' => $checksum,
                
            ];
    if($merchantOrderId !=''){
         $data['merchantOrderId']=$merchantOrderId;
     }
       dd($data);
             
        //   return view('confirm_payment',compact('providerReferenceId', 'transactionId'));
    
        }else{
    
            //HANDLE YOUR ERROR MESSAGE HERE
            dd('ERROR : ' .$request->code. ', Please Try Again Later.');
        }
        
       
    }
  


    public function sendNewsletterEmail(Request $request){
    
        // Vaidate the email
        $request->validate([
            'email' => 'required|email',
        ]);

        try {
            $email = $request->input('email');

            // Send a subscription email
            Mail::raw('Thank you for subscribing to our newsletter!', function ($message) use ($email) {
                $message->to($email)
                        ->subject('Newsletter Subscription');
            });

            return response()->json([
                'success' => true,
                'message' => 'Subscription email sent successfully!',
            ]);
        } catch (\Exception $e) {
            \Log::error('Newsletter subscription failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to send subscription email. Please try again later.'. $e->getMessage(),
            ], 500);
        }
    }

 
}

