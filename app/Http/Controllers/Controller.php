<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public $IMAGE_BASE_PATH = "";
    public $IMAGE_BASE_URL = "";
    public $USER_BASE_PATH = "";
    public $USER_BASE_URL = "";


    public function __construct(){
    	$this->USER_BASE_PATH       = storage_path().'/app/users/';
        $this->USER_BASE_URL        = url('storage/app/users/');
        $this->IMAGE_BASE_PATH      = storage_path().'/app/';
        $this->IMAGE_BASE_URL       = url('storage/app/');

        View::share('USER_BASE_PATH',$this->USER_BASE_PATH);
    }
}
