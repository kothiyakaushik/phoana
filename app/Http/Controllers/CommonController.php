<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\GeneralRepo;
use App\Models\AdminSettings;
use App\Models\Users;

class CommonController extends Controller
{
    public static function output($code=0, $msg='', $responseData=array())
    {
    	header("Content-Type:text/json");
        
        $outputData = array(
            "code"		=>$code,
            "msg"		=>$msg,
            "response"	=>$responseData
        );
        
        echo json_encode($outputData);
        exit;
    }
    
    public static function generateVerificationCode($length = 6)
    {
        $random = "";
        srand((double)microtime() * 1000000);

        $data = "1234567890";

        for ($i = 0; $i < $length; $i++) {
            $random .= substr($data, (rand() % (strlen($data))), 1);
        }

        return $random;
    }

    public static function httpGet($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $output = curl_exec($ch);

        curl_close($ch);
        return $output;
    }

    public static function getAdminSetting($type){
        return AdminSettings::select("$type")->first();
    }

    public static function userFullDetail($userid){
        $userdetail = Users::find($userid);
            $userdetail->userProfile;
            $userdetail->user_id = $userdetail->id;

            if (!empty($image)) {
               $userdetail->image = $image;
            }

            return $userdetail;
    }
}
