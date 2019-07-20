<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class EventInfo extends Model
{
    protected $table = 'event_info';
    protected $fillable = [
        'date','event_id','location','type','end_time','start_time'
    ];
}
