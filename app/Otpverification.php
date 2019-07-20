<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Otpverification extends Model
{
    protected $table = 'otpverification';
    protected $fillable = [
        'mobile_number','otp'
    ];
}
