<?php
namespace App\Repository;

use App\Models\User;
use App\Repository\Repo;
//use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GeneralRepo extends Repo {

	//user record update
	public static function update($table, $updatedata, $cmpdata){
		$updatedata["updated_at"] = date('Y-m-d H:i:s');
		$upadatedrs = DB::table($table)->where($cmpdata)->update($updatedata);
        return $upadatedrs;
	}
}