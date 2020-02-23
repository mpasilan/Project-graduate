<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $table = 'bookings';
    protected $dates = ['booking_date','check_in_date','check_out_date'];
    
    protected $guarded = [];


    public function guest()
    {
        return $this->belongsTo(Guest::class,'guest_id','id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class,'payment_id','id');
    }

    public function rooms()
    {
        return $this->belongsTo(Rooms::class,'rooms_id','id');
    }
}
