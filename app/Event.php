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
}
