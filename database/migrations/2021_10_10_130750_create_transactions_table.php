<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('room_id');
            $table->string('rental_id');
            $table->string('payment_method');
            $table->float('total_price');
            $table->String('transaction_status');
            $table->String('title');
            $table->Date('start');
            $table->Date('end');
            $table->String('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
