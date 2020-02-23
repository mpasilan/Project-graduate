<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
	protected $table = 'priority';
    protected $guarded = [];

    protected $fillable = [
        'priority_id','priority',
    ];

    public function tickets()
    {
    	return $this->hasMany(Ticket::class);
    }
}
