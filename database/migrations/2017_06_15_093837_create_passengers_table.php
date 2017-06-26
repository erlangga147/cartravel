<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('promotions', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('display_name');
            $table->string('description');

            $table->string('image_name');
            $table->string('mime');
            $table->string('original_image_name');

            $table->timestamps();
        });

        Schema::create('customers', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();

            $table->timestamps();
        });

        Schema::create('paymentMethods', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('display_name');
            $table->string('description');

            $table->timestamps();
        });

        Schema::create('bookings', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('customer_id')->unsigned();
            $table->integer('paymentMethod_id')->unsigned();

            $table->string('payment_status');

            $table->string('image_name')->nullable();
            $table->string('mime')->nullable();
            $table->string('original_image_name')->nullable();

            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('paymentMethod_id')->references('id')->on('paymentMethods')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('passengers', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('carSchedule_id')->unsigned();
            $table->integer('booking_id')->unsigned();
            $table->integer('passenger_id')->unsigned();
            $table->integer('seat_number');
            $table->date('departure_date');
            $table->timestamps();

            $table->foreign('carSchedule_id')->references('id')->on('carSchedules')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('passenger_id')->references('id')->on('passengers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('tickets');
        Schema::drop('bookings');
        Schema::drop('passengers');
        Schema::drop('customers');
        Schema::drop('paymentMethods');
        Schema::drop('promotions');
        
    }
}
