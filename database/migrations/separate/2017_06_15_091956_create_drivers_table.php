<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table to store information of the Drivers
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->string('image_name')->nullable();
            $table->string('mime')->nullable();
            $table->string('original_image_name')->nullable();
            
            $table->string('phone');
            $table->string('address');
            $table->timestamps();
        });

        //Create table to store Schedule of the Drivers. For now let's call it 'carSchedule'
        Schema::create('carSchedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id')->unsigned();
            $table->integer('driver_id')->unsigned();
            $table->integer('fare_id')->unsigned();
            
            $table->string('status');
            $table->string('message');
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('drivers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fare_id')->references('id')->on('fares')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('carSchedules');
        Schema::drop('drivers');
    }
}
