<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    protected $table = 'event_images';
    protected $fillable = [
        'event_id','image'
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
