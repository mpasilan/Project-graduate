<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
	protected $table = 'guests';
    
    protected $guarded = [];

   public function booking()
    {
    	return $this->hasMany(Bookings::class);
    }
}
