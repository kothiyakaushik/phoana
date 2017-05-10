<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Controllers\CommonController as Common;
use DB;
use App\Models\Users;
use App\Models\UserProfileDetail;
use App\Repository\GeneralRepo;
use App\Repository\MailRepo;
use App\Repository\SMSRepository;
use App\Repository\UserRepo;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class GeneralController extends Controller
{
    private $request;
    private $API_KEY = "tdGzxmPv7J6C93Xu2tcwtrXA3cl6tt";
    private $APP_TITLE = "";
    private $msg = 'Failed';
    private $code = 0;
    private $responseData = array();
    private $tableName = "users";


    public function __construct(Request $request){
        
        $json = file_get_contents('php://input');

        $objRequest = (json_decode($json) != NULL) ? json_decode($json,TRUE) : $_REQUEST;

        //$objRequest = (json_decode($json) != NULL) ? json_decode($json,TRUE) : $request;
        
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

    public function getCountryList(){

    	$countryId  = !empty($this->request['country_id']) ? $this->request['country_id'] : "";
        $country = Common::getCountryList($countryId);
        
        $this->responseData['country'] = $country;
        $this->code = '1';
        Common::output($this->code, $this->msg, $this->responseData);
    }

    public function getStateList(){

    	$countryId  = !empty($this->request['country_id']) ? $this->request['country_id'] : "";
    	$stateId  = !empty($this->request['state_id']) ? $this->request['state_id'] : "";
        
        $country = Common::getStateList($countryId);
        
        $this->responseData['country'] = $country;
        $this->code = '1';
        Common::output($this->code, $this->msg, $this->responseData);
    }
}
