<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('forename')->nullable();
            $table->string('surname')->nullable();
            $table->string('school')->nullable();
            $table->string('schoollocation')->nullable();
            $table->enum('level',['basisonderwijs','vmbo','havo','vwo','mbo1','mbo2','mbo3','mbo4','hbo','wo','anders'])->nullable();
            $table->enum('role',['student','docent','anders'])->nullable();
            $table->rememberToken();
            $table->timestamps();
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