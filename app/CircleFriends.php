<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CircleFriends extends Model
{
    protected $table = 'circle_friends';
    protected $fillable = [
        'circle_id','user_id','user_name','email','mobile_number','friend'
    ];
}
