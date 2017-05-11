<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pincodes extends Model
{
     protected $fillable = [
        'id','pincode_no','status','user_id', 'city_id'
    ];
}
