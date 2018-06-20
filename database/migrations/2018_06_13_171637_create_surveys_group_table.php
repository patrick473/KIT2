<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys_group', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('survey_id');
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade'); 
            $table->unsignedInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade'); 
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
        Schema::dropIfExists('surveys_group');
    }
}
