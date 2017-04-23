<?php
namespace App\Repository;

use App\Models\Users;
use App\Repository\Repo;
use App\Models\userProfileDetail;
//use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserRepo extends Repo {

	/* Check IF user registered with facebook  */
    public static function isUserExistWithEmail($email)
    {
        $user = Users::select('id','email','username','mobile','type','gmailid', 'fbid')
                        ->where("email",$email)
                        ->first();

        if($user)
            return $user;
        else
            return array();
    }
    public static function isUserExistWithUsername($username)
    {
    	$user = Users::select('id','email','username','mobile','type','gmailid', 'fbid')
                        ->where("username",$username)
                        ->first();

        if($user)
            return $user;
        else
            return array();
    }
    public static function isUserExistWithMobile($mobile){

        $user = Users::select('id','email','username','mobile','type','gmailid', 'fbid')
                        ->where("mobile",$mobile)
                        ->first();

        if($user)
            return $user;
        else
            return array();
    }

    public static function userProfile($userid){
        $user = Users::where("id",$userid)
                        ->first();

        if($user)
            return $user;
        else
            return array();
    }
}