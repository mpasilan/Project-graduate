<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

	protected $table = 'payment';
    
    protected $guarded = [];

        public function payment_status()
    {
        return $this->belongsTo(Payment_status::class,'status_id','id');
    }

        public function type_of_payment()
    {
        return $this->belongsTo(Type_of_payment::class,'TypeOfPayment_id','id');
    }
}
