<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController as Common;
use DB;
use App\Models\Users;
use App\Models\UserProfileDetail;
use App\Repository\GeneralRepo;
use App\Repository\SMSRepository;
use App\Repository\UserRepo;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    private $request;
    private $API_KEY = "tdGzxmPv7J6C93Xu2tcwtrXA3cl6tt";
    private $APP_TITLE = "";
    private $msg = 'Failed';
    private $code = 0;
    private $responseData = array();
    private $tableName = "users";

    public function __construct(){
        
        $json = file_get_contents('php://input');

        $objRequest = (json_decode($json) != NULL) ? json_decode($json,TRUE) : $_REQUEST;
        
        $this->request = $objRequest;

        $this->APP_TITLE = env("PROJECT_TITLE");

        if(empty($this->request['api_key']) || ($this->request['api_key'] != $this->API_KEY))
        {
            $this->msg =  "Invalid request api key!";
            $this->code = 0;
            Common::output($this->code, $this->msg, $this->responseData);
        }
        unset($this->request['api_key']);
    }

    public function validateApiToken(){
        
        $getApiToken = empty($this->request['api_token']) ? "" : $this->request['api_token'];
        $newApiToken = $this->generateApiToken();
        
        //if($getApiToken != $newApiToken)
        if($getApiToken != $getApiToken)
        {
            $this->msg =  "Invalid request token!";
            $this->code = 0;
            Common::output($this->code, $this->msg, $this->responseData);
        }
    }

    public function generateApiToken(){
        if(isset($this->request['api_token'])){
            unset($this->request['api_token']);
        }

        $exclude_key = array();
        $temp_request = $this->request;
        ksort($temp_request);

        foreach ($exclude_key as $key => $value) {
            if(in_array($value, $this->request)){
                unset($temp_request[$value]);
            }
        }
        
        foreach ($temp_request as $tempkey => $tempvalue) {
            if (count($tempvalue) >= 2) {
                unset($temp_request[$tempkey]);
            }
        }

        $data = implode("|", $temp_request);
        $data = $data."|";

        $data = substr($data , 0,100);

        $uniuqeToken = hash_hmac("sha1", $data, $this->API_KEY);
        return $uniuqeToken;
    }

    public function signup(){

        $this->validateApiToken();

        $email = empty($this->request['email']) ? "" : $this->request['email'];
        $mobile = empty($this->request['mobile']) ? "" : $this->request['mobile'];
        $password = empty($this->request['password']) ? "" : $this->request['password'];
        $username = empty($this->request['username']) ? "" : $this->request['username'];
        $type = empty($this->request['type']) ? "" : $this->request['type'];
        $fbid = empty($this->request['fbid']) ? "" : $this->request['fbid'];
        $gmailid = empty($this->request['gmailid']) ? "" : $this->request['gmailid'];
        $image = empty($this->request['image']) ? "" : $this->request['image'];
        $device_id = empty($this->request['device_id']) ? "" : $this->request['device_id'];
        $device_type = empty($this->request['device_type']) ? "" : $this->request['device_type'];
        $device_token = empty($this->request['device_token']) ? "" : $this->request['device_token'];
        $app_version = empty($this->request['app_version']) ? "" : $this->request['app_version'];
        
        unset($this->request['image']);
        unset($this->request['api_token']);

        //user already register  or not
        $userEmailCheck = UserRepo::isUserExistWithEmail($email);
        $usernameCheck = UserRepo::isUserExistWithUsername($username);
        $userMobileCheck = UserRepo::isUserExistWithMobile($mobile);
        
        $userid = "";
        //check user already register or not
        if ($type == "1" && !empty($fbid)) {
            
            $userfb_det = Users::select('id', 'fbid')
                        ->where("fbid",$fbid)
                        ->first();

            if($userfb_det){
                    
                $userupdate = array('last_login'=> date('Y-m-d H:i:s'),'device_token'=> trim($device_token), 'app_version'=> $app_version,'device_type'=> trim($device_type) );

                $userupdatecmp = array('id'=> $userfb_det->id);
                
                $userdevice = GeneralRepo::update('users', $userupdate, $userupdatecmp);

                $userid = $userfb_det->id;
                $this->code = '1';
                $this->msg = 'Your login successfully.';
                

            }else{
                
                //check this user name already exist or not
                if(!empty($userEmailCheck) || !empty($usernameCheck) || !empty($userMobileCheck)) {
            
                    $this->responseData['already_exists'] = "1";
                    $this->msg = "You are already registerd with this email or username or mobile no.";
                }
                else{
                    $userid = GeneralRepo::inserData('users', $this->request['app_version']);
                    
                    $userdetail = Users::find($userid);

                    $smsService = new SMSRepository();
                    $code = $smsService->sendOTPOnRegister($userdetail);

                    $this->code = "1";
                    $this->msg = "Registration done. Verification code is sent to your device!";
                    $this->responseData['already_exists'] = "0";
                }
            }
        }
        elseif ($type == "2" && !empty($gmailid)) {
            
            $usergmail_det = Users::select('id', 'gmailid')
                        ->where("gmailid",$gmailid)
                        ->first();

            if($usergmail_det){
                
                $userupdate = array('last_login'=> date('Y-m-d H:i:s'),'device_token'=> trim($device_token), 'app_version'=> $app_version,'device_type'=> trim($device_type) );

                $userupdatecmp = array('id'=> $usergmail_det->id);
                
                $userdevice = GeneralRepo::update('users', $userupdate, $userupdatecmp);

                $this->code = '1';
                $this->msg = 'Your login successfully.';
                // $this->responseData['token'] = $dupuser_det[0]->usertoken;
                // $this->responseData['userid'] = $dupuser_det[0]->id;
                // $this->responseData['username'] = $dupuser_det[0]->username;
                // $this->responseData['userdetail'] = $dupuser_det;
            }else{
                
                //check this user name already exist or not
                if(!empty($userEmailCheck) || !empty($usernameCheck) || !empty($userMobileCheck)) {
            
                    $this->responseData['already_exists'] = "1";
                    $this->msg = "You are already registerd with this email or username or mobile no.";
                }
                else{
                    
                    $userid = GeneralRepo::inserData('users', $this->request);

                    $userdetail = Users::find($userid);

                    $smsService = new SMSRepository();
                    $code = $smsService->sendOTPOnRegister($userdetail);

                    $this->code = "1";
                    $this->msg = "Registration done. Verification code is sent to your device!";
                    $this->responseData['already_exists'] = "0";
                }
            }

        }elseif ($type == "3") {
            
            if(!empty($userEmailCheck) || !empty($usernameCheck) || !empty($userMobileCheck)) {
            
                $this->responseData['already_exists'] = "1";
                $this->msg = "You are already registerd with this email or username or mobile no.";
            }else{

                $this->request['password'] = bcrypt($this->request['password']);
                
                $userid = GeneralRepo::inserData('users', $this->request);
                
                $userdetail = Users::find($userid);

                $smsService = new SMSRepository();
                $code = $smsService->sendOTPOnRegister($userdetail);


                if (!empty($image)) {
                      
                    if (!empty($userid)) {
                        
                        //check image is url or not
                        if (filter_var($image, FILTER_VALIDATE_URL) === TRUE) {
                            $userProfileDeail  = array();
                            $userProfileDeail['image'] = $image;
                            $userid = GeneralRepo::inserData('users_profile_detail', $userProfileDeail);
                        }
                    }
                }

                $this->code = "1";
                $this->msg = "Registration done. Verification code is sent to your device!";
                $this->responseData['already_exists'] = "0";
            }

        }

        $userdetail = array();
        if (!empty($userid)) {
            $userdetail = Common::userFullDetail($userid);
        }
        $this->responseData['userdetail'] = $userdetail;

        Common::output($this->code, $this->msg, $this->responseData);
    }

    /* == Make verification ==*/
    public function verifyUser()
    {
        $this->validateApiToken();

        $userId = !empty($this->request['user_id']) ? $this->request['user_id']: "";
        $mobile = !empty($this->request['mobile']) ? $this->request['mobile']: "";
        $email = !empty($this->request['email']) ? $this->request['email']: "";

        $verificationCode = !empty($this->request['verification_code']) ? $this->request['verification_code'] : "";

        if((!empty($userId) ||  !empty($email) || !empty($mobile))  && !empty($this->request['verification_code']))
        {

            $q = Users::where('expire_at', '>', Carbon::now());
                            if (!empty($email)) {
                                $q->where("email",$email);
                            }
                            if (!empty($userId)) {
                                $q->Where("id",$userId);
                            }
                            if (!empty($mobile)) {
                                $q->Where("mobile",$mobile);
                            }
             $userDetail = $q->first();

             //echo "<pre>";print_r($userDetail);exit;
            if(!empty($userDetail))
            {

                if($verificationCode == $userDetail->email_mobile_verify_code)
                {

                    $userupdate = array(
                            'email_mobile_verify_code' => "", 
                            'verified_user' => '1'
                        );
                    
                    $userupdatecmp = array('id'=> $userDetail->id);
                    $userdevice = GeneralRepo::update('users', $userupdate, $userupdatecmp);

                    $this->code = "1";
                    $this->msg = "OTP verified successfully.";
                    

                    $userDetail->user_id = $userDetail->id;

                    if (!empty($userDetail->image)) {
                       $userDetail->image = $userDetail->image;
                    }
                    $this->responseData['userdetail'] = $userDetail;


                }else{
                    $this->msg =  "Verification code does not match!";
                }
            }else{
                $this->msg =  "User does not exists!";
            }
        }else{
            $this->msg =  "Parameter value can not be blank!";
        }
        Common::output($this->code, $this->msg, $this->responseData);
    }

    /* == send otp for register user or expire otp at login time ==*/
    public function resendOtpRegister()
    {
        $this->validateApiToken();

        $email = !empty($this->request['email']) ? $this->request['email']: "";

        $mobile = !empty($this->request['mobile']) ? $this->request['mobile'] : "";

        if(!empty($mobile) || !empty($email) )
        {
            $q = Users::where('status','1');
                            if (!empty($email)) {
                                $q->Where("email",$email);
                            }
                            if (!empty($mobile)) {
                                $q->Where("mobile",$mobile);
                            }
            $userDetail = $q->first();

            if(!empty($userDetail))
            {
                $smsService = new SMSRepository();
                $code = $smsService->sendOTPOnRegister($userDetail);

                $this->code = "1";
                $this->msg = "Verification code is sent to your device!";

            }else{
                $this->msg =  "User does not exists!";
            }
        }else{
            $this->msg =  "Parameter value can not be blank!";
        }
        Common::output($this->code, $this->msg, $this->responseData);
    }

    /* == send otp for forget user==*/
    public function resendOtpForgetpass()
    {
        $this->validateApiToken();

        $email = !empty($this->request['email']) ? $this->request['email']: "";

        $mobile = !empty($this->request['mobile']) ? $this->request['mobile'] : "";

        if(!empty($mobile) || !empty($email) )
        {
            $q = Users::where('status','1');
                            if (!empty($email)) {
                                $q->where("email",$email);
                            }
                            if (!empty($mobile)) {
                                $q->where("mobile",$mobile);
                            }
            $userDetail = $q->first();

            //echo "<pre>";print_r($userDetail);exit;

            if(!empty($userDetail))
            {

                if($userDetail->verified_user == '1')
                {
                    $smsService = new SMSRepository();
                    $code = $smsService->sendOTPOnForgetPass($userDetail);
                    $this->code = "1";
                    $this->msg = "Verification code is sent to your device!";
                }else{
                    $this->msg = "Your account is not verify.";
                }
            }else{
                $this->msg =  "User does not exists!";
            }
        }else{
            $this->msg =  "Parameter value can not be blank!";
        }
        Common::output($this->code, $this->msg, $this->responseData);
    }

    /* == Make verification ==*/
    public function resetPassword()
    {
        $this->validateApiToken();

        $userId = !empty($this->request['user_id']) ? $this->request['user_id']: "";
        $mobile = !empty($this->request['mobile']) ? $this->request['mobile']: "";
        $email = !empty($this->request['email']) ? $this->request['email']: "";
        $password = !empty($this->request['password']) ? $this->request['password']: "";
        $verificationCode = !empty($this->request['verification_code']) ? $this->request['verification_code'] : "";

        if((!empty($userId) ||  !empty($email) || !empty($mobile))  && !empty($this->request['verification_code']) && !empty($password))
        {

            $q = Users::where('expire_at', '>', Carbon::now())
                            ->where('forgottoken', $verificationCode);
                            //$q->orWhere("id",$userId);
                            if (!empty($userId)) {
                                $q->orWhere("id",$userId);
                            }
                            if (!empty($email)) {
                                $q->orWhere("email",$email);
                            }
                            if (!empty($mobile)) {
                                $q->orWhere("mobile",$mobile);
                            }
            
                $userDetail = $q->first();
             

            if(!empty($userDetail))
            {

                if($verificationCode == $userDetail->forgottoken)
                {

                    $password= bcrypt($this->request['password']);
                    $userupdate = array(
                            'forgottoken' => "", 
                            "password"=> $password
                        );
                    
                    $userupdatecmp = array('id'=> $userDetail->id);
                    $userdevice = GeneralRepo::update('users', $userupdate, $userupdatecmp);

                    $this->code = "1";
                    $this->msg = "Password change successfully.";
                    

                    $userDetail->user_id = $userDetail->id;

                    if (!empty($userDetail->image)) {
                       $userDetail->image = $userDetail->image;
                    }
                    $this->responseData['userdetail'] = $userDetail;


                }else{
                    $this->msg =  "Verification code does not match!";
                }
            }else{
                $this->msg =  "User does not exists!";
            }
        }else{
            $this->msg =  "Parameter value can not be blank!";
        }
        Common::output($this->code, $this->msg, $this->responseData);
    } 

    public function signin()
    {
        
        $this->validateApiToken();

        $username = !empty($this->request['username']) ? $this->request['username']: "";

        //$email = !empty($this->request['email']) ? $this->request['email']: "";
        //$mobile = !empty($this->request['mobile']) ? $this->request['mobile']: "";
        $password = !empty($this->request['password']) ? $this->request['password']: "";
        $deviceId = !empty($this->request['device_id']) ? $this->request['device_id']: "";
        $deviceType = !empty($this->request['device_type']) ? $this->request['device_type']: "";
        $deviceToken = !empty($this->request['device_token']) ? $this->request['device_token']: "";
        $appVersion = !empty($this->request['app_version']) ? $this->request['app_version']: "";

        $latitude = !empty($this->request['latitude']) ? $this->request['latitude']: "";
        $longitude = !empty($this->request['longitude']) ? $this->request['longitude']: "";

        if ((!empty($username) || !empty($mobile) || !empty($username)) && !empty($password)) {
            
            if ((Auth::attempt(['type'=>'3','password'=>$password, 'username'=> $username])) || (Auth::attempt(['type'=>'3','password'=>$password, 'email'=> $username])) || (Auth::attempt(['type'=>'3','password'=>$password, 'mobile'=> $username ])) ) {

                //$userDetail = Users::where('username', $username)->orWhere('email', $email)->orWhere('mobile', $mobile)->first();

                // $q = Users::where('status', '1');
                //             if (!empty($username)) {
                //                 $q->where("username",$username);
                //             }
                //             if (!empty($email)) {
                //                 $q->where("email",$email);
                //             }
                //             if (!empty($mobile)) {
                //                 $q->where("mobile",$mobile);
                //             }
                // $userDetail = $q->first();

                $q = Users::where('status', '1');
                                $q->where("username",$username);
                                $q->orWhere("email",$username);
                                $q->orWhere("mobile",$username);
                
                $userDetail = $q->first();
            
                
                if ($userDetail->verified_user != '1' ) {
                    $this->msg = 'Please verify mobile or email before login.';                  
                }else{

                    $userupdate = array('last_login'=> date('Y-m-d H:i:s'),'device_id'=> trim($deviceId), 'device_type'=> trim($deviceType), 'device_token'=> $deviceToken,'app_version'=> $appVersion);

                    $userupdatecmp = array('id'=> $userDetail->id);
                    
                    $userupdate = GeneralRepo::update('users', $userupdate,  $userupdatecmp);

                    $userProfile = UserProfileDetail::firstOrNew(array('user_id' => $userDetail->id));
                    $userProfile->user_id = $userDetail->id;
                    $userProfile->latitude = $latitude;
                    $userProfile->longitude = $longitude;
                    $userProfile->save();

                    $userDetail = Common::userFullDetail($userDetail->id);
                    $this->code = '1';
                    $this->msg = 'You have logged in successfully.';
                    $this->responseData['userdetail'] = $userDetail;
                }                
            }else{
                $this->msg = "Username/email or password is wrong.";
            }

        }else{
            $this->msg =  "Parameter value can not be blank!";
        }

        Common::output($this->code, $this->msg, $this->responseData);
    }

    public function changePassword(){
        

        $this->validateApiToken();

        $userId = !empty($this->request['user_id']) ? $this->request['user_id']: "";
        $email = !empty($this->request['email']) ? $this->request['email']: "";
        $mobile = !empty($this->request['mobile']) ? $this->request['mobile']: "";
        $password = !empty($this->request['current_password']) ? $this->request['current_password']: "";
        $new_password = !empty($this->request['new_password']) ? $this->request['new_password']: "";

        if ((!empty($userId) || !empty($mobile) || !empty($email)) && !empty($password) && !empty($new_password)) {

            if ((Auth::attempt(['type'=>'3','password'=>$password, 'id'=> $userId])) || (Auth::attempt(['type'=>'3','password'=>$password, 'email'=> $email])) || (Auth::attempt(['type'=>'3','password'=>$password, 'mobile'=> $mobile ])) ) {

                
                $q = Users::where('status', '1');
                            if (!empty($userId)) {
                                $q->where("id",$userId);
                            }
                            if (!empty($email)) {
                                $q->where("email",$email);
                            }
                            if (!empty($mobile)) {
                                $q->where("mobile",$mobile);
                            }
                $userDetail = $q->first();

                
                $new_password= bcrypt($this->request['new_password']);

                $userupdate = array('password' => $new_password);

                    $userupdatecmp = array('id'=> $userDetail->id);
                    
                    $userupdate = GeneralRepo::update('users', $userupdate,  $userupdatecmp);

                    $userProfile = UserProfileDetail::firstOrNew(array('user_id' => $userDetail->id));
                    $this->code = "1";
                    $this->msg = "Your password is change successfully.";
                    $this->responseData['userdetail'] = $userDetail;

            }else{
                $this->msg = "Your current password is wrong.";
            }


        }else{
            $this->msg =  "Parameter value can not be blank!";
        }

        Common::output($this->code, $this->msg, $this->responseData);
    }

    /* == Save user personnal info ==*/
    public function saveUserInfo()
    {
        $this->validateApiToken();

        $userId  = $this->request['user_id'];

        $userdata = array();
        if(isset($this->request['phone']))
            $userdata['phone'] = $this->request['phone'];

        if(isset($this->request['username']))
            $userdata['username'] = $this->request['username'];

        if(isset($this->request['password']))
            $userdata['password'] = $this->request['password'];

        $userprofiledata = array();
        if(isset($this->request['first_name']))
            $userprofiledata['first_name'] = $this->request['first_name'];

        if(isset($this->request['last_name']))
            $userprofiledata['last_name'] = $this->request['last_name'];
        
        if(isset($this->request['alternative_mobile']))
            $userprofiledata['alternative_mobile'] = $this->request['alternative_mobile'];

        if(isset($this->request['address']))
            $userprofiledata['address'] = $this->request['address'];

        if(isset($this->request['zipcode']))
            $userprofiledata['zipcode'] = $this->request['zipcode'];

        if(isset($this->request['city']))
            $userprofiledata['city'] = $this->request['city'];

        if(isset($this->request['country']))
            $userprofiledata['country'] = $this->request['country'];

    
        $userDetail = Users::where("id",$userId)->first();
        if($userDetail)
        {
            $userdetUpdate = $userDetail->update($userdata);
            
            $userProfileUpdate = userProfileDeail::where('user_id', $userId)
                            ->update($userprofiledata);

            $this->msg =  "User profile upadte successfully!";

        }
        else{
            $this->msg =  "User does not exists!";
        }
        Common::output($this->code, $this->msg, $this->responseData);
    }

    public function print_token(){
        echo $this->generateApiToken();
    }
}
