<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\GeneralRepo;
use App\Models\AdminSettings;
use App\Models\Users;
//use Mail;
use View;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;


class CommonController extends Controller
{
    public static function output($code=0, $msg='', $responseData=array())
    {
    	header("Content-Type:text/json");

        if (empty($responseData)) {
            $responseData = (object)$responseData;
        }
        
        $outputData = array(
            "code"		=>(int)$code,
            "msg"		=>$msg,
            "response"	=>$responseData
        );
        
        //return response()->json($outputData);
        
        //return response()->json($outputData);

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



            if (!empty($userdetail->userProfile->image)) {
                $userdetail->userProfile->image = url('/images/users/').'/'.$userdetail->userProfile->image;
            }
            
            
            return $userdetail;
    }

    public static function sendMail($data)
    {

        //echo "<pre>";print_r(view($data['templateName']));exit;

        //echo view($data['templateName']);exit;
        //echo "<pre>";print_r($data);exit;

        // $userDetail = Users::where('id',$userID)->first();
        
        // $data['templateName']   = 'emails.register';
        // //$data['name']           = $userProfile->firstname.$userProfile->lastname;
        // //$data['email']          = $userDetail->email;
        // $data['email']          = "kothiyakaushik08@gmail.com";
        // $data['subject']        = "New Registration!";
        // $data['data']           = $userDetail;
        
        //echo view('emails.register');exit;

        //echo View::make('emails.register');exit;


        // Mail::send('emails.register', $data, function ($message) {
        //     $message->from('us@example.com', 'Laravel');

        //     $message->to('kothiyakaushik08@gmail.com')->cc('bar@example.com');
        // });

        $code = "1234";
        $user = array();
        Mail::send('emails.register', compact('code'), function (Message $message) use ($user, $code) {
            $message
                ->to('kothiyakaushik08@gmail.com')
                ->from('info@allcybersolutions.co', 'Phoana')
                ->subject("OTP Verification")
                ->embedData([
                    'categories' => ['user_group1']
                ], 'sendgrid/x-smtpapi');
        });



        // Mail::send($data['templateName'], array("data" => $data), function($message) use ($data)
        // {
        //     $message->to($data['email'], $data['name'])->subject($data['subject']);
        // });    
    }

    public static function uploadProfilePicture($data)
    {


        $imgName            = !empty($data['imageName']) ? $data['imageName'] : "";
        $imgFile            = !empty($data['imageFile']) ? $data['imageFile'] : "";
        $destPath           = !empty($data['destPath']) ? $data['destPath'] : "";
        $resizeDestPath     = !empty($data['resizeDestPath']) ? $data['resizeDestPath'] : "";
        $resizeOriginal     = !empty($data['resizeOriginal']) ? $data['resizeOriginal'] : false;
        if(!empty($resizeDestPath)) // make thumbnail image
        {
            // resize 100x100
            self::resizeImageTo(100,$imgName, $imgFile, $resizeDestPath);
        }
        if($resizeOriginal) // resize original image
            $savedImage = self::resizeImageTo(300,$imgName, $imgFile, $destPath);
        else
            $savedImage = $imgFile->move($destPath, $imgName);
        
        if($savedImage)
            return true;
        else{
            return false;
        }
    }

    public static function resizeImageTo($size, $imageName, $imageFile, $imagePath)
    {

        $thumb_img = Image::make($imageFile->getRealPath())->resize($size, $size,function($constraint){
             $constraint->aspectRatio();
         });
         $thumb_img->save($imagePath.'/'.$imageName);
        return true;
    }

    public static function removeProfilePicture($oldProfilePic, $destPath){
            
        if (@unlink($destPath.'/'.$oldProfilePic))
        {
            return true;
        }else{
            return false;
        }
            
    }

    public static function checkPasswordFormat($password, $userId){

        // if (preg_match("^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$", $password, $match)) {
            

        //     print "Match found!";
        // }else{
        //     print "no Match found!";
        // }

        //if (preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $password))

        if ($password) {
            
            if(preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])\S*$', $password))
            {
                print "Match found!";
            }else{
                print "no Match found!";
            }
        }
    
        
        
    }
}
