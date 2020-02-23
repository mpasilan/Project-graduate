<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingRoomPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_room', function (Blueprint $table) {
            $table->integer('booking_id')->unsigned()->index();
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->integer('room_id')->unsigned()->index();
            $table->foreign('room_id')->references('room_no')->on('rooms')->onDelete('cascade');
            $table->primary(['id', 'room_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_room');
    }
}
