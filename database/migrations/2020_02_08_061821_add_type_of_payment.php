<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeOfPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('type_of_payment')->insert(array(
            'TypeOfPayment' => 'cash'
        ));
        DB::table('type_of_payment')->insert(array(
            'TypeOfPayment' => 'card'
        ));    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('type_of_payment')->where('TypeOfPayment','=','cash')->delete();
        DB::table('type_of_payment')->where('TypeOfPayment','=','card')->delete();
    }
}
