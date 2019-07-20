<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventInvites extends Model
{
	protected $table = 'event_invites';
    protected $fillable = [
        'event_id','user_id','user_name','email','mobile_number'
    ];
}
