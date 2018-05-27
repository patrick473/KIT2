<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagecomponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pagecomponents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('page_id');
            $table->foreign('page_id')->references('id')->on('Pages')->onDelete('cascade'); 
            $table->json('information');
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
        Schema::dropIfExists('Pagecomponents');
    }
}
