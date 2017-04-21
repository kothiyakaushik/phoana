<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\GeneralRepo;

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
}
