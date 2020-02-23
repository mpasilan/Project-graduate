<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = 'rooms';
    
    protected $guarded = [];

    public function booking()
    {
        return $this->hasMany(Bookings::class);
    }

    public function room_category()
    {
        return $this->belongsTo(Room_category::class,'category_id','id');
    }
}
