<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
     protected $table = 'tickets';
    
    protected $guarded = [];

    public function assigned_tickets()
    {
    	return $this->belongsTo(Assigned_ticket::class);
    }
    public function status()
    {
    	return $this->belongsTo(Status::class);
    }
    public function priority()
    {
        return $this->belongsTo(Priority::class,'priority_id','priority_id');
    }

    public function assigned()
    {
        return $this->belongsTo(User::class,'assign_to','id');
    }
    
    
    

}
