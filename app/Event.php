<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'uuid','user_id','name','type','invite_message'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function eventimage()
    {
        return $this->hasMany('App\EventImage');
    }
    public function eventinfo()
    {
        return $this->hasMany('App\EventInfo');
    }
    public function eventinvites()
    {
        return $this->hasMany('App\EventInvites');
    }
}
