<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->length(30);
            $table->string('name')->length(250);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('birth_day');
            $table->string('phone_number')->length(15);
            $table->string('address')->length(300)->nullable();
            $table->date('join_time')->nullable();
            $table->date('retired_time')->nullable();
            $table->string('username')->length(100)->nullable();
            $table->string('password')->length(250)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->integer('level')->nullable($value = 0);
            $table->string('avatar')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
