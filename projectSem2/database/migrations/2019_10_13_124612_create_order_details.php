<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_order_id');
            $table->foreign('fk_order_id')
                    ->references('order_id')
                    ->on('order');
            $table->string('fk_product_id');
            $table->foreign('fk_product_id')
                    ->references('product_id')
                    ->on('product');
            $table->integer('discount_per_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
