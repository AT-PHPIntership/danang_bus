<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions', function(Blueprint $table){
            $table->increments('id');
            $table->integer('order');
            $table->string('fee');
            $table->integer('status');
            $table->time('time');
            $table->integer('route_id')->unsigned();
            $table->integer('stop_id')->unsigned();
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
        Schema::drop('directions');
    }
}
