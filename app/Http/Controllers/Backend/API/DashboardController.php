<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\BranchGallery;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Booking\Models\Booking;
use Modules\Category\Models\Category;
use Modules\Category\Transformers\CategoryResource;
use Modules\Employee\Transformers\EmployeeResource;
use Modules\Service\Models\Service;
use Modules\Service\Models\ServiceGallery;
use Modules\Service\Transformers\ServiceResource;
use Modules\Slider\Models\Slider;
use Modules\Slider\Transformers\SliderResource;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;
use App\Helpers\CommonHelper;
use App\Models\WalletTransactions;
use DB;
class DashboardController extends Controller
{
    public function dashboardDetail(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $branchId = $request->input('branch_id'); // Assuming the branch ID is passed in the request

        $branch = Branch::find($branchId);

        // if (! $branch) {
        //     return response()->json(['status' => false, 'message' => __('branch.branch_notfound')], 404);
        // }

        $categories = Category::with('media')->where('status', 1)->whereNull('parent_id')
            // ->whereHas('branches', function ($query) use ($branchId) {
            //     $query->where('branch_id', $branchId);
            // })
            ->paginate($perPage)
            ->forPage(1, 6);
        $services = Service::with(['media', 'branches' => function ($query) use ($branchId) {
            // $query->where('branch_id', $branchId);
        }])->paginate($perPage)->forPage(1, 6);

        $employees = User::with('media')->withCount(['branches', 'services'])
            // ->whereHas('branches', function ($query) use ($branchId) {
            //     $query->where('branch_id', $branchId);
            // })
            ->orderByDesc('services_count')
            ->paginate($perPage)
            ->forPage(1, 6);

        $slider = SliderResource::collection(Slider::where('status', 1)->paginate($perPage));

        $responseData = [
            'category' => CategoryResource::collection($categories)->toArray(request()),
            'service' => ServiceResource::collection($services)->toArray(request()),
            'top_experts' => EmployeeResource::collection($employees)->toArray(request()),
            'slider' => $slider,
        ];

        return response()->json([
            'status' => true,
            'data' => $responseData,
            'message' => __('messages.dashboard_detail'),
        ], 200);
    }

    public function searchList(Request $request)
    {

        $query = $request->input('query');
        $results = [];

        // Search in Branches
        $branches = Branch::where('name', 'like', "%{$query}%")->get();
        $results['branches'] = $branches;

        // Search in Employees // Need To Add Role Base
        $employees = User::role('employee')->where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('first_name', 'like', "%{$query}%")
                ->orWhere('last_name', 'like', "%{$query}%");
        })->get();
        $results['employees'] = $employees;

        // Search in Categories
        $categories = Category::where('name', 'like', "%{$query}%")->get();
        $results['categories'] = $categories;

        $subcategories = Category::where('name', 'like', "%{$query}%")
            ->orWhere('parent_id', 'like', "%{$query}%")
            ->get();
        $results['subcategory'] = $subcategories;

        // Search in Bookings
        $bookings = Booking::where('note', 'like', "%{$query}%")->get();
        $results['bookings'] = $bookings;

        // Search in Services
        $services = Service::where('name', 'like', "%{$query}%")->get();
        $results['services'] = $services;

        return response()->json($results);
    }

    public function globalGallery(Request $request)
    {
        $galleryId = $request->input('gallery_id');

        // Retrieve branch gallery
        $branchGallery = BranchGallery::find($galleryId);
        if ($branchGallery) {
            $branch = Branch::find($branchGallery->branch_id);

            if ($branch) {
                return response()->json([
                    'status' => true,
                    'data' => [
                        'gallery' => $branchGallery,
                        'branch' => $branch,
                    ],
                    'message' => __('branch.branch_gal_retrived'),
                ], 200);
            }
        }

        // Retrieve service gallery
        $serviceGallery = ServiceGallery::find($galleryId);
        if ($serviceGallery) {
            $service = Service::find($serviceGallery->service_id);

            if ($service) {
                return response()->json([
                    'status' => true,
                    'data' => [
                        'gallery' => $serviceGallery,
                        'service' => $service,
                    ],
                    'message' => __('service.service_gal_retrived'),
                ], 200);
            }
        }

        // Gallery not found
        return response()->json([
            'status' => false,
            'message' => __('messages.gallery_notfound'),
        ], 404);
    } 
    
    public function getUserAddress(Request $request)
    {
        if (empty($request->user_id)) {
            
            return response()->json([
            'status' => false,
            'message' => __('user_id field is required'),
            ], 200);
            
        }
        
        $address = Address::where('user_id' , $request->user_id)->latest()->get();
        if ($address) {
            
            return response()->json([
                'status' => true,
                'data' => $address,
                'message' => __('address list'),
            ], 200);
        }else{
                
            return response()->json([
                'status' => false,
                'message' => __('address not found'),
            ], 200);
        }
    }
    
    public function saveUserAddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(), 
            ], 200); 
        }
    
        if (!empty($request->id)) { 
            $address = Address::find($request->id); 
        } else { 
            $address = new Address(); 
        }
        
        $address->user_id = $request->user_id;
        $address->latitude = round($request->latitude, 4);
        $address->longitude = round($request->longitude, 4); 
        $address->address = $request->address;
        $address->address_line_1 = $request->address_line_1;
        $address->address_line_2 = $request->address_line_2;
        $address->postal_code = $request->postal_code;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->add_type = $request->add_type;
    
        if ($address->save()) {
            return response()->json([
                'status' => true,
                'data' => $address,
                'message' => __('address list'),
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => __('Failed to save address'),
            ], 500);
        }
    }
    
     public function deleteUserAddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'address_id' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(), 
            ], 200); 
        }
        
        $address = Address::where(['user_id' => $request->user_id, 'id' => $request->address_id ]); 
     
        if ($address->delete()) {
            return response()->json([
                'status' => true,
                'data' => [],
                'message' => __('address deleted successfully'),
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => __('address not found'),
            ], 500);
        }
    }

    public function addWallet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all(),
            ], 200);
        }
    
        $user = User::find($request->user_id);
    
        if ($user == null) {
            return response()->json([
                'status' => false,
                'errors' => 'User not found',
            ], 200);
        }
    
        $user->wallet_amount += $request->amount;
        $user->wallet_point  = CommonHelper::userPointConvert($user->wallet_amount);
    
        if ($user->save()) {
            
            $walletData = [
                'user_id' => $user->id,
                'type' => 'add' ,
                'amount' => $request->amount
                ];
            WalletTransactions::create($walletData);
            
            return response()->json([
                'status' => true,
                'data' => $user,
                'message' => __('Amount added successfully to wallet.'),
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'errors' => 'Failed to add amount to wallet',
            ], 200);
        }
    }
    
    public function getWallet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all(),
            ], 200);
        }
    
        $user = User::find($request->user_id);
    
        if ($user == null) {
            return response()->json([
                'status' => false,
                'errors' => 'User not found',
            ], 200);
        }
    
        if ($user) {
            return response()->json([
                'status' => true,
                'data' => $user,
                'message' => __('wallet data.'),
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'errors' => 'Failed to get wallet',
            ], 200);
        }
    }
    
    public function getWalletHistory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all(),
            ], 200);
        }
    
        $user = User::find($request->user_id);
    
        if ($user == null) {
            return response()->json([
                'status' => false,
                'errors' => 'User not found',
            ], 200);
        }
        
        $walletTransactions = WalletTransactions::where('user_id', $request->user_id)->latest()->get();
    
        if ($walletTransactions) {
            return response()->json([
                'status' => true,
                'data' => $walletTransactions,
                'message' => __('wallet transaction history data.'),
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'errors' => 'Failed to get wallet transaction history',
            ], 200);
        }
    }
    
    public function callConnect(Request $request)
    {
        $account = 'Ebonow_Trans';
        $pin = 'eWE1peyf';
        $campaignid = '568253';
        $msisdn = '91'.$request->to_number;
        $agent = '91'.$request->from_number;
    
        $response = CommonHelper::sendVoiceRequest($account, $pin, $campaignid, $msisdn, $agent);
        
        $responseData = json_decode($response);
    
        if ($responseData && isset($responseData->status) && $responseData->status === 'Success') {
             return response()->json([
                'status' => true,
                'message' => 'Call connected successfully.',
              ], 200);
        
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to connect the call.', 
            ], 500); 
        }
    
        return response()->json([
            'status' => true,
            'message' => 'Call connected successfully.',
        ], 200);
    }

    

}
