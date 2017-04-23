<?php
namespace App\Repository;

use App\Models\User;
use App\Repository\Repo;
//use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GeneralRepo extends Repo {

	public static function inserData($table, $data){
		$data['created_at'] = date('Y-m-d H:i:s');
		$lastInsertId = DB::table($table)->insertGetId($data);
		return $lastInsertId;
	}
	
	//user record update
	public static function update($table, $updatedata, $cmpdata){
		$updatedata["updated_at"] = date('Y-m-d H:i:s');
		$upadatedrs = DB::table($table)->where($cmpdata)->update($updatedata);
        return $upadatedrs;
	}

	
}