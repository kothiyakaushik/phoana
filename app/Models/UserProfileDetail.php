<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfileDetail extends Model
{

	protected $fillable = [
        'user_id','first_name','last_name','image','alternative_mobile','userwebsite','address','birthday','latitude','city','state','country','pincode', 'is_completed'
    ];
    protected $table = 'users_profile_detail';
    
    public function users()
    {
        return $this->belongsTo('\App\Models\Users','user_id','id');
    }
}
