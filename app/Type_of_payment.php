<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_of_payment extends Model
{

	protected $table = 'type_of_payment';
    
    protected $guarded = [];

            public function payment()
    {
    	return $this->hasMany(Payment::class);
    }
}
