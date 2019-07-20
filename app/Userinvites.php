<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Userinvites extends Model
{
    protected $table = 'userinvites';
    protected $fillable = [
        'user_id','user_name','email','mobile_number'
    ];
}
