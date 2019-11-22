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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            $table->unsignedBigInteger('customer_id_order');
            $table->foreign('customer_id_order')
                    ->references('customer_id')
                    ->on('customer');
            $table->string('note')->length(300);
            $table->timestamps();
            $table->float('total_money_discount');
            $table->float('discount_nullable')->length(3,3);
            $table->float('total_money');
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
