<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password','phone_no','status','uuid'
    ];
}
