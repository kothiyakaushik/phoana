<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $fillable = [
        'id','name','status','user_id'
    ];
}
