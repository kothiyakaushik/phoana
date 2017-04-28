<?php
namespace App\Repository;

use App\Models\Users;
use App\Repository\Repo;
use App\Models\userProfileDetail;
//use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\CommonController as Common;

class MailRepo extends Repo {

    public static function sendRegistrationSuccessEmail($userID)
    {

        $userDetail = Users::where('id',$userID)->first();
        
        $data['templateName']   = 'emails.register';
        //$data['name']           = $userProfile->firstname.$userProfile->lastname;
        //$data['email']          = $userDetail->email;
        $data['email']          = "kothiyakaushik08@gmail.com";
        $data['subject']        = "New Registration!";
        $data['data']           = $userDetail;
        Common::sendMail($data);
        

        // if(!empty($userProfile->users) && $userProfile->users->is_sent_signup_email =='0')
        // {
        //     $data['templateName']   = 'emails.register';
        //     $data['name']           = $userProfile->firstname.$userProfile->lastname;
        //     $data['email']          = $userProfile->users->email;
        //     $data['subject']        = "New Registration!";
        //     $data['data']           = $userProfile;
        //     Common::sendMail($data);

        //     //Update send email flag
        //     $userProfile->users->is_sent_signup_email = '1';
        //     $userProfile->users->save();
        // }
        
    }
}