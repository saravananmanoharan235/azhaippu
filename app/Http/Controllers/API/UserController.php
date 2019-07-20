<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Edujugon\PushNotification\PushNotification;

use App\User;
use App\Otpverification;
use App\Userinvites;


class UserController extends Controller
{
    public $successStatus = 200;
    
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login','register','sendotp']]);
    }

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        $input = $request->all();
        if(Auth::attempt(['email' => $input['email'], 'password' => $input['password']])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('Azhaippu')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    /**
     * Send Otp
     *
     * @return \Illuminate\Http\Response
     */
    public function sendotp(Request $request){

        $validator = Validator::make($request->all(), [
            'mobile_number' => 'required'
        ]);


        if ($validator->fails()) {
            //return response()->json(['error'=>$validator->errors()], 401);      
            $message = $validator->errors();
            return response()->json(['success' => false, 'messages' => 'The given data was invalid.', 'errors' => $validator->errors()], 422);      
        }

        $input = $request->all();   


        $otp = mt_rand(100000, 999999);
        
        $sendData = [
                   'notification' => [
                           'title'=>'Azhaippu OTP',
                           'body'=>$otp,
                           'sound' => 'default'
                           ]
                   ];
        $device_token = array($input['device_token']);
        //$response = send_notification($sendData,$device_token);
        $push = new PushNotification('fcm');
        $response = $push->setMessage($sendData)
                    //->setConfig(['dry_run' => false])
                    ->setDevicesToken($device_token)
                    ->send()
                    ->getFeedback();
                    //->sendByTopic('dogs');
        //$otpdata = array('mobile_number'=>$input['mobile_number'],'otp'=>$otp);

        //$otpverification = Otpverification::create($otpdata);       

        $user = Otpverification::updateOrCreate(['mobile_number' => $input['mobile_number']], [ 
            'otp' => $otp
        ]);


        if($response->success){
            return response()->json(['success'=>$response->success,'otp'=>$otp], $this->successStatus);
        }else{
            return response()->json(['success'=>'false'], $this->successStatus);            
        } 
        
    }


    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'dob' => 'required',
            'anniversary' => 'required',
            'age' => 'required',
            'display_name' => 'required',
            'otp' => 'required',
            'mobile_number' => 'required',
            'c_password' => 'required|same:password',
        ]);
        $input = $request->all();
        if ($validator->fails()) {     
            $message = $validator->errors();
            return response()->json(['success' => false, 'messages' => 'The given data was invalid.', 'errors' => $validator->errors()], 422);      
        }
        $input['dob'] = dbsavedate($input['dob']);
        $input['anniversary'] = dbsavedate($input['anniversary']);

        $checkotp = Otpverification::where('mobile_number',$input['mobile_number'])->where('otp',$input['otp'])->first();
        if(count($checkotp)<1){
            return response()->json(['success'=>'false','message'=>'Invalid OTP'], $this->successStatus); 
        }

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        //echo "<pre>";print_r($user);die;
        $success['token'] =  $user->createToken('Azhaippu')->accessToken;
        $success['user_name'] =  $user->name;
        $success['user_id'] =  $user->id;


        return response()->json(['success'=>$success], $this->successStatus);
    }


    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function userinfo()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    /**
     * Invice Friends
     *
     * @return \Illuminate\Http\Response
     */
    public function invite_friends(Request $request)
    {
        $inputall = $request->all();
        $user = Auth::user();
        //echo "<pre>";print_r($user);die;
        foreach ($inputall as $key => $input) {
            Userinvites::updateOrCreate(['mobile_number' => $input['mobile_number']], [ 
                'user_id' => $user->id,
                'user_name' => $input['user_name'],
                'mobile_number' => $input['mobile_number'],
                'email' => $input['email']
            ]);
        }
        

    }

    /**
     * Logout
     *
     * @return \Illuminate\Http\Response
     */
    public function logoutApi()
    { 
        if (Auth::check()) {
           Auth::user()->AauthAcessToken()->delete();
        }
    }
}