<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->string('em_roll_no_order');
            $table->foreign('em_roll_no_order')
                    ->references('em_roll_no')
                    ->on('employee');
            $table->unsignedBigInteger('customer_id_order');
            $table->foreign('customer_id_order')
                    ->references('customer_id')
                    ->on('customer');
            $table->dateTime('closed_time');
            $table->dateTime('created_time');
            $table->integer('dateTime')->length(30);
            $table->string('note')->length(300);
            $table->integer('discount_nullable')->length(2,3);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
