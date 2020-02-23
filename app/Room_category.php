<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room_category extends Model
{
   protected $table = 'room_category';
    
    protected $guarded = [];

       public function room()
    {
    	return $this->hasMany(Rooms::class);
    }

}
