<?php
namespace App\Repository;

use App\Models\Users;
use App\Repository\Repo;
//use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserRepo extends Repo {

	/* Check IF user registered with facebook  */
    public static function isUserExistWithEmail($email)
    {
        $user = Users::select('id','email','mobile','type')
                        ->where("email",$email)
                        ->first();

        if($user)
            return $user;
        else
            return array();
    }
}