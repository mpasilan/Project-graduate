<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoomCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::table('room_category')->insert(array(
            'category' => 'junior',
            'price' => '1600'
        ));

         DB::table('room_category')->insert(array(
            'category' => 'standard',
            'price' => '2500'
        ));
        DB::table('room_category')->insert(array(
            'category' => 'superior',
            'price' => '3000'
        ));
        DB::table('room_category')->insert(array(
            'category' => 'family',
            'price' => '4500'
        ));

     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('room_category')->where('category','=','junior')->delete();
        DB::table('room_category')->where('category','=','standard')->delete();
        DB::table('room_category')->where('category','=','superior')->delete();
        DB::table('room_category')->where('category','=','family')->delete();
    }
}
