<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->text('room_type'); // name to dati
            $table->integer('room_count'); 
            $table->text('description');
            $table->float('price');
            $table->text('amenities')->nullable(); //
            $table->integer('recommended_capacity');
            $table->integer('maximum_capacity');
            $table->text('image_paths');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
