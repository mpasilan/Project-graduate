<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('payment_status')->insert(array(
            'status' => 'Paid'
        )); 
        DB::table('payment_status')->insert(array(
            'status' => 'Un-paid'
        ));    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('payment_status')->where('status','=','Paid')->delete();
        DB::table('payment_status')->where('status','=','Un-paid')->delete();
    }
}
