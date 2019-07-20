<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    protected $table = 'circles';
    protected $fillable = [
        'uuid','user_id','name','image','friend'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function circlefriends()
    {
        return $this->hasMany('App\CircleFriends');
    }
}
