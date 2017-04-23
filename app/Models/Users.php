<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\UserProfileDetails;
class Users extends Model
{

	protected $fillable = [
        'id','username','email','mobile','verified_user','profile_type','type','fbid','gmailid','app_version','device_token','usertoken'
    ];

    protected $hidden = array('password', 'remember_token');

    public function userProfile() {
        return $this->hasOne('\App\Models\UserProfileDetail', 'user_id', 'id');
    }

}