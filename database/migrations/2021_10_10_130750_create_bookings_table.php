<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            // $table->string('room_id'); // many to many so pivot table
            // $table->string('rental_id'); // many to many so pivot table
            $table->string('payment_method');
            $table->string('address');
            $table->integer('adult');
            $table->integer('children')->nullable();
            $table->string('amount_paid')->nullable(); // hard coded
            $table->float('total_price');
            $table->String('booking_status')->default("Pending");
            $table->String('description')->nullable();
            $table->Date('start');
            $table->Date('end');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
