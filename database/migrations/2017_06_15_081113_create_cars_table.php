<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table to store list of Car Types
        Schema::create('carTypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('display_name');
            $table->string('description');
            $table->integer('capacity')->unsigned();
            $table->timestamps();
        });

        //Create table to store list of Fares. Fares is combination between Route, CarType (Class), and Departure Time
        Schema::create('fares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carType_id')->unsigned();
            $table->integer('route_id')->unsigned();

            $table->time('departure_time');

            $table->integer('price');
            $table->timestamps();

            $table->foreign('carType_id')->references('id')->on('carTypes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('route_id')->references('id')->on('routes')->onUpdate('cascade')->onDelete('cascade');
        });

        //Create table to store list of Cars
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carType_id')->unsigned();

            $table->string('brand');
            $table->string('license_plate')->unique();
            $table->integer('year')->unsigned();
            $table->timestamps();

            $table->foreign('carType_id')->references('id')->on('carTypes')->onUpdate('cascade')->onDelete('cascade');
        });

        //Create table to store several kinds of Seat Layouts
        Schema::create('seatLayouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carType_id')->unsigned();

            $table->integer('seat_number');
            $table->integer('x_position');
            $table->integer('y_position');
            $table->timestamps();

            $table->foreign('carType_id')->references('id')->on('carTypes')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('seatLayouts');
        Schema::drop('cars');
        Schema::drop('fares');
        Schema::drop('carTypes');
    }
}
