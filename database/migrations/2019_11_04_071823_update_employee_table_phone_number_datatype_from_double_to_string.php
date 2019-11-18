<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEmployeeTablePhoneNumberDatatypeFromDoubleToString extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee', function (Blueprint $table) {
            $table->string('phone_number')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee', function (Blueprint $table) {
            //
        });
    }
}