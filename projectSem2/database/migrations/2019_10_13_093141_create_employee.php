<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->string('em_roll_no')->primary()->length(30);
            $table->string('fullName')->length(250)->nullable();
            $table->date('birth_day');
            $table->unsignedInteger('phone_number')->length(15);
            $table->string('username')->length(100)->nullable();
            $table->string('password')->length(250)->nullable();
            $table->string('address')->length(300);
            $table->boolean('system_authorization');
            $table->date('join_time');
            $table->date('retired_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
