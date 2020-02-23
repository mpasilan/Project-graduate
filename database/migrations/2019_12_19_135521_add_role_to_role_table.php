<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('role')->insert(array(
            'role_name' => 'admin'
        ));

         DB::table('role')->insert(array(
            'role_name' => 'employee'
        ));



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
 
    }
}
