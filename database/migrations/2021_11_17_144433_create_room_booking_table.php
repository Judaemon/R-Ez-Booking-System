<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomBookingTable extends Migration
{
    public function up()
    {
        Schema::create('room_booking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id');
            $table->integer('room_id');
            $table->Date('start');
            $table->Date('end');
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_booking');
    }
}
