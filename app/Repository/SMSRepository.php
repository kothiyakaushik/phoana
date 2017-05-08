<?php

namespace App\Repository;

use App\Http\Middleware\VerifyTokenMiddleWare;
use App\Http\Controllers\CommonController as Common;
//use App\Verification;
use App\Utility;
use App\Models\Users;
use Carbon\Carbon;

class SMSRepository
{
    public function sendOTPOnRegister($user)
    {
        $code = $this->getVerificationCode($user);
        $message = "Your OTP for phoana is $code";
        
        $this->send($message, $user);
        return $code;
    }

    public function sendOTPOnProfile($user, $updatedmobile)
    {
        $code = $this->getVerificationCodeForProfileVerify($user);
        $message = "Your OTP for phoana is $code";
        $user->mobile = $updatedmobile;
        
        $this->send($message, $user);
        return $code;
    }

    public function sendOTPOnForgetPass($user)
    {
        $code = $this->getVerificationCodeForgetPass($user);
        $message = "Your OTP for phoana is $code";
        
        $this->send($message, $user);
        return $code;
    }


    public function send($message, $user)
    {
        $mobile = $user->mobile;
        //$message = urlencode($message);
        $url = "http://203.129.225.68/API/WebSMS/Http/v1.0a/index.php?";
        $param = [];
        $param['username'] = 'niranjanjee';
        $param['password'] = 654321;
        $param['sender'] = 'PHOANA';
        $param['to'] = $mobile;
        $param['message'] = $message;
        $param['reqid'] = 1;
        $param['format'] = 'json';
        $param['route_id'] = 235;

        return Common::httpGet($url.http_build_query($param));
    }

    public function getVerificationCodeForgetPass($user)
    {

        $expire_time_setting = Common::getAdminSetting('user_login_time');
        $expire_time = 24;
        if (!empty($expire_time)) {
            $expire_time = $expire_time_setting->user_login_time;
        }
        $verification = Users::firstOrCreate(['mobile' => $user->mobile]);
        $verification->forgottoken = Common::generateVerificationCode();
        $verification->expire_at = Carbon::now()->addHours($expire_time);
        $verification->save();
        return $verification->forgottoken;
    }

    public function getVerificationCodeForProfileVerify($user)
    {

        $expire_time_setting = Common::getAdminSetting('user_login_time');
        $expire_time = 24;
        if (!empty($expire_time)) {
            $expire_time = $expire_time_setting->user_login_time;
        }
        $verification = Users::firstOrCreate(['id' => $user->id]);
        $verification->email_mobile_verify_code = Common::generateVerificationCode();
        $verification->expire_at = Carbon::now()->addHours($expire_time);
        $verification->save();
        return $verification->email_mobile_verify_code;
    }

    public function getVerificationCode($user)
    {

        $expire_time_setting = Common::getAdminSetting('user_login_time');
        $expire_time = 24;
        if (!empty($expire_time)) {
            $expire_time = $expire_time_setting->user_login_time;
        }
        $verification = Users::firstOrCreate(['mobile' => $user->mobile]);
        $verification->email_mobile_verify_code = Common::generateVerificationCode();
        $verification->expire_at = Carbon::now()->addHours($expire_time);
        $verification->save();
        return $verification->email_mobile_verify_code;
    }

    public function sendOTPOnForgetPassword($user)
    {
        $code = $this->getVerificationCode($user);
        $messsage = "Your OTP for phoana is  $code";
        $this->send($messsage, $user);
        return $code;
    }

}