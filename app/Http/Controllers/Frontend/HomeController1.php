<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Mail\MailMailableSend;
use Illuminate\Support\Facades\Mail;
use App\Models\NotificationTemplate; 
use App\Mail\ContactMail;
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
    public function product_details(Request $request)
    {
        return view('frontend.product_details');
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
    
    public function cart(Request $request)
    {
      return view('frontend.cart');
    }
     public function cartCheckout(Request $request)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $total_amount = DB::table('cart')->where('cart.user_id', Auth::id())->leftJoin('shop_products as p', 'p.id', '=', 'cart.product_id')->sum('p.default_price');

      return view('front.checkout.cart',compact('user', 'total_amount'));
    }
    

    public function contact(Request $request)
    {
        return view('frontend.contact');
    }
    
    // Handle form submit
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
}