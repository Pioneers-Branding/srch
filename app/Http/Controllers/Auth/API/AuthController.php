<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Auth\Trait\AuthTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\RegisterResource;
use App\Http\Resources\SocialLoginResource;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Helpers\CommonHelper;
use Carbon\Carbon;

class AuthController extends Controller
{
    use AuthTrait;

    public function register(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
        'first_name' => ['required', 'string', 'max:191'],
        'last_name' => ['required', 'string', 'max:191'],
        'mobile' => ['required', 'unique:users'],
        // 'password' => ['required', Rules\Password::defaults()],
        // 'gender' => ['required'],
        ]);
    
        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors(), 422);
        }
    
        $user = $this->registerTrait($request);
        $success['token'] = $user->createToken(setting('app_name'))->plainTextToken;
        $success['name'] = $user->name;
    
        $userResource = new RegisterResource($user);

        return $this->sendResponse($userResource, __('messages.register_successfull'));
    }
    
    public function vendorRegister(Request $request)
    {
            
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users,email',
            'mobile'     => 'required|min:10|unique:users,mobile',
            'gender'     => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['status' => false, 'error' => $validator->errors()->first()], 200);
        }

    
        $data = $request->all();
        $data['is_manager'] = 1;
    
        if ($request->confirmed == 1) {
            $data['email_verified_at'] = Carbon::now();
        } else {
            $data['email_verified_at'] = null;
        }
        
        if (!empty($request->wallet_amount)) {
           $data['wallet_point']  = CommonHelper::userPointConvert($request->wallet_amount);
           $data['wallet_amount'] = $request->wallet_amount;
        }
        
        $data['latitude'] =  round($request->latitude, 4);
        $data['longitude'] =  round($request->longitude, 4);
    
        $user = User::create($data);
    
        $profile = [
            'about_self'      => $request->about_self,
            'expert'          => $request->expert,
            'facebook_link'   => $request->facebook_link,
            'instagram_link'  => $request->instagram_link,
            'twitter_link'    => $request->twitter_link,
            'dribbble_link'   => $request->dribbble_link,
        ];
    
        $user->profile()->updateOrCreate([], $profile);
    
        if ($request->hasFile('profile_image')) {
            
            storeMediaFile($user, $request->file('profile_image'), 'profile_image');
        }
    
        $employee_id = $user->id;
    
        $roles = ['employee'];
    
        $user->syncRoles($roles);
    
        \Artisan::call('cache:clear');
    
        if ($request->has('all_service') && $request->all_service !== null) {
            $services = Service::where('status', 1)->get();
    
            foreach ($services as $value) {
                $service_data = [
                    'employee_id' => $employee_id,
                    'service_id'  => $value->id,
                ];
                ServiceEmployee::create($service_data);
            }
        }
    
        return response()->json(['status' => true, 'message' => 'Vendor Registration Successfully'], 200);
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
     
    public function login_otp(Request $request)
    
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|max:10',
        ]);
       
        if ($validator->fails()) {
            
            return response()->json(['status' => false, 'error' => $validator->errors() ]);
        }
        
        
        $user = User::where('mobile', request('mobile'))->first();

        if ($user == null) {
            return response()->json(['status' => false, 'message' => __('messages.register_before_login')]);
        }

        if (!empty($user)) {
            
            $otp = rand(1000, 9999);

            $user->otp = $otp;

            $user->save();
            
            $response['otp'] = $otp;
            
            
            CommonHelper::sendOtp($user->mobile, $otp , $user->first_name.' '.$user->last_name);

            return response()->json(['status' => true, 'data' => $response, 'message' => 'Otp sent successfully.' ]);

        } else {
            return $this->sendError(__('messages.not_matched'), ['error' => __('messages.unauthorised')], 200);
        }

    }
    
    // message sent
    
     public function sendMessage(Request $request)
    {
        // Validate incoming request parameters
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|max:10',
            'message' => 'required|string|max:160', // Adjust max length as per your SMS provider's limit
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json(['status' => false, 'error' => $validator->errors()]);
        }

        // Find user by mobile number (example)
        $user = User::where('mobile', $request->input('mobile'))->first();

        // Handle user not found (example)
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found']);
        }

        // Get message content from request
        $messageContent = $request->input('message');

        // Example of sending message using helper function (adjust based on your implementation)
        $sendResult = CommonHelper::sendMessage($user->mobile, $messageContent);

        // Handle sending failure (example)
        if (!$sendResult) {
            return response()->json(['status' => false, 'message' => 'Failed to send message']);
        }

        // Return success response with message details (example)
        return response()->json(['status' => true, 'message' => 'Message sent successfully']);
    }
    
    
    public function login(Request $request)
    {
     
     // dd($request->all());
        
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|max:10',
            'otp' => 'required',
        ]);
       
        if ($validator->fails()) {
            
            return response()->json(['status' => false, 'error' => $validator->errors() ]);
        }
        

        $user = User::where('mobile', request('mobile'))->first();

        if ($user == null) {
            return response()->json(['status' => false, 'message' => __('messages.register_before_login')]);
        }

        if (!empty($user)) {
            
            if ($user->otp != $request->otp) {
                return response()->json(['status' => false, 'message' => 'Otp is wrong']);
            }

            Auth::login($user);

            $user = Auth::user();

            if ($user->is_banned == 1 || $user->status == 0) {
                return response()->json(['status' => false, 'message' => __('messages.login_error')]);
            }

            $user->player_id = $request->input('player_id'); 
            
            $user->server_key = isset($request->server_key) ? $request->server_key : $user->server_key;
            
            $user->device_token = isset($request->device_token) ? $request->device_token : $user->device_token;


            $user->save();

            if ($user->hasRole('user') || $user->hasRole('employee')) {
            
                $user['api_token'] = $user->createToken(setting('app_name'))->plainTextToken;
    
                $loginResource = new LoginResource($user);
                $message = __('messages.user_login');
    
                return $this->sendResponse($loginResource, $message);
                
            }else {
                return $this->sendError(__('messages.role_not_matched'), ['error' => __('messages.unauthorised')], 200);
            }
            
        } else {
            return $this->sendError(__('messages.not_matched'), ['error' => __('messages.unauthorised')], 200);
        }

    }

    public function socialLogin(Request $request)
    {

        $input = $request->all();

        if ($input['login_type'] === 'mobile') {
            $user_data = User::where('username', $input['username'])->where('login_type', 'mobile')->first();
        } else {
            $user_data = User::where('email', $input['email'])->first();
        }

        if ($user_data != null) {
            if (! isset($user_data->login_type) || $user_data->login_type == '') {
                if ($request->login_type === 'google') {
                    $message = __('validation.unique', ['attribute' => 'email']);
                } else {
                    $message = __('validation.unique', ['attribute' => 'username']);
                }

                return $this->sendError($message, 400);
            }
            $message = __('messages.login_success');
        } else {

            if ($request->login_type === 'google') {
                $key = 'email';
                $value = $request->email;
            } else {
                $key = 'username';
                $value = $request->username;
            }

            $trashed_user_data = User::where($key, $value)->whereNotNull('login_type')->withTrashed()->first();

            if ($trashed_user_data != null && $trashed_user_data->trashed()) {
                if ($request->login_type === 'google') {
                    $message = __('validation.unique', ['attribute' => 'email']);
                } else {
                    $message = __('validation.unique', ['attribute' => 'username']);
                }

                return $this->sendError($message, 400);
            }

            if ($request->login_type === 'mobile' && $user_data == null) {
                $otp_response = [
                    'status' => true,
                    'is_user_exist' => false,
                ];

                return $this->sendError($otp_response);
            }

            if ($request->login_type === 'mobile' && $user_data != null) {
                $otp_response = [
                    'status' => true,
                    'is_user_exist' => true,
                ];

                return $this->sendError($otp_response);
            }

            $password = ! empty($input['accessToken']) ? $input['accessToken'] : $input['email'];

            $input['user_type'] = 'user';
            $input['display_name'] = $input['first_name'].' '.$input['last_name'];
            $input['password'] = Hash::make($password);
            $input['user_type'] = isset($input['user_type']) ? $input['user_type'] : 'user';
            if (request('player_id') != null) {
                $input['player_id'] = request('player_id');
            }
            $user = User::create($input);
            $user->assignRole('user');

            \Artisan::call('cache:clear');

            if (! empty($input['profile_image'])) {
                $media = $user->addMediaFromUrl($input['profile_image'])->toMediaCollection('profile_image');
                $user->avatar = $media->getUrl();
            }
            $user_data = User::where('id', $user->id)->first();
            $message = trans('messages.save_form', ['form' => $input['user_type']]);
        }

        if (request('player_id') != null) {
            $user_data->player_id = request('player_id');
            $user_data->save();
        }
        $user_data['api_token'] = $user_data->createToken('auth_token')->plainTextToken;

        $socialLogin = new SocialLoginResource($user_data);

        return $this->sendResponse($socialLogin, $message);
    }

    public function logout(Request $request)
    { 

        $user = Auth::guard('sanctum')->user();

        if ($request->is('api*')) {
            $user->player_id = null;
            $user->save();
            
             Auth::logout();
            return response()->json(['status' => true, 'message' => __('messages.user_logout')]);
        }
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = Password::sendResetLink(
            $request->only('email')
        );
        $user = User::where('email', $request->email)->first();
        if ($user == null) {
            return $response == Password::RESET_LINK_SENT
                ? response()->json(['message' => __($response), 'status' => true], 200)
                : response()->json(['message' => __($response), 'status' => false], 200);
        }

        return $response == Password::RESET_LINK_SENT
            ? response()->json(['message' => __($response), 'status' => true], 200)
            : response()->json(['message' => __($response), 'status' => false], 400);
    }

    public function changePassword(Request $request)
    {
        $user = \Auth::user();
        $user_id = ! empty($request->id) ? $request->id : $user->id;
        $user = User::where('id', $user_id)->first();
        if ($user == '') {
            return response()->json([
                'status' => false,
                'message' => __('messages.user_notfound'),
            ], 400);
        }

        $hashedPassword = $user->password;

        $match = Hash::check($request->old_password, $hashedPassword);

        $same_exits = Hash::check($request->new_password, $hashedPassword);

        if ($match) {
            if ($same_exits) {
                $message = __('messages.old_new_pass_same');

                return response()->json([
                    'status' => false,
                    'message' => __('messages.same_pass'),
                ], 400);
            }

            $user->fill([
                'password' => Hash::make($request->new_password),
            ])->save();

            $success['api_token'] = $user->createToken(setting('app_name'))->plainTextToken;
            $success['name'] = $user->name;

            return response()->json([
                'status' => true,
                'data' => $success,
                'message' => __('messages.pass_successfull'),
            ], 200);
        } else {
            $success['api_token'] = $user->createToken(setting('app_name'))->plainTextToken;
            $success['name'] = $user->name;
            $message = __('messages.valid_password');

            return response()->json([
                'status' => true,
                'data' => $success,
                'message' => __('messages.pass_successfull'),
            ], 200);
        }
    }

    public function updateProfile(Request $request)
    {
        $user = \Auth::user();
        if ($request->has('id') && ! empty($request->id)) {
            $user = User::where('id', $request->id)->first();
        }
        if ($user == null) {

            return response()->json([
                'message' => __('messages.no_record'),
            ], 400);
        }
        $user->fill($request->all())->update();

        $user_data = User::find($user->id);
        if ($request->has('profile_image')) {

            $request->file('profile_image');

            storeMediaFile($user_data, $request->file('profile_image'), 'profile_image');
        }

        $user_data->save();

        $message = __('messages.profile_update');
        $user_data['user_role'] = $user->getRoleNames();
        $user_data['profile_image'] = $user->profile_image;
        unset($user_data['roles']);
        unset($user_data['media']);

        return response()->json([
            'status' => true,
            'data' => $user_data,
            'message' => $message,
        ], 200);
    }

    public function userDetails(Request $request)
    {
        $userID = $request->id;
        $user = User::find($userID);
        if (! $user) {
            return response()->json(['status' => false, 'message' => __('messages.user_notfound')], 404);
        }

        return response()->json(['status' => true, 'data' => $user, 'message' => __('messages.user_details_successfull')]);
    }

    public function deleteAccount(Request $request)
    {
        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        if ($user == null) {
            $message = __('messages.user_not_found');

            return response()->json([
                'status' => false,
                'message' => $message,
            ], 200);
        }
        $user->booking()->forceDelete();
        $user->forceDelete();
        $message = __('messages.delete_account');

        return response()->json([
            'status' => true,
            'message' => $message,
        ], 200);
    }
}
