<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_status extends Model
{

    protected $table = 'payment_status';
    
    protected $guarded = [];

        public function payment()
    {
    	return $this->hasMany(Payment::class);
    }
}
