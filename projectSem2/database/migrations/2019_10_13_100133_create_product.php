<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->string('product_id')->primary()->length(30);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                    ->references('category_id')
                    ->on('product_category');
            $table->string('product_name')->length(400);
            $table->string('link_img');
            $table->boolean('exp_status');
            $table->integer('price');
            $table->double('quantity');

          

            

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
