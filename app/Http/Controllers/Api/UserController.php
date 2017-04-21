<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController as Common;
use DB;
use App\Models\User;
use App\Repository\GeneralRepo;
use App\Repository\UserRepo;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        
        if($getApiToken != $newApiToken)
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
        $device_token = empty($this->request['device_token']) ? "" : $this->request['device_token'];

        //user already register  or not
        $userEmailCheck = UserRepo::isUserExistWithEmail($email);

        //check fb user already register or not
        if ($type == "1" && !empty($fbid) empty($userEmailCheck)) {
            
            $userfb_det = Users::select('id', 'fbid')
                        ->where("fbid",$fbid)
                        ->first();

            if($userfb_det){
                $userupdate = array('last_login'=> date('Y-m-d H:i:s'),'gcmid'=> trim($gcmid), 'devicetype'=> trim($devicetype) );

                $userupdatecmp = array('id'=> $userfb_det->id);
                
                $userdevice = GeneralRepo::update('users', $userupdate, $userupdatecmp);

                $this->code = '1';
                $this->msg = 'Your login successfully.';
                $this->responseData['token'] = $dupuser_det[0]->usertoken;
                $this->responseData['userid'] = $dupuser_det[0]->id;
                $this->responseData['username'] = $dupuser_det[0]->username;
                $this->responseData['userdetail'] = $dupuser_det;
            }

            


        }



        

        if (empty($userEmailCheck)) {
            
        }else{
            echo "call";exit;
        }



        Common::output($this->code, $this->msg, $this->responseData);
    }

    public function print_token(){
        echo $this->generateApiToken();
    }
}
