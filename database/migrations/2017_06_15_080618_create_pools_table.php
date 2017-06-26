<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table to store list of Pools
        Schema::create('pools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->string('address');
            $table->timestamps();
        });


        //Create table to store list of Routes
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('origin_id')->unsigned();
            $table->integer('destination_id')->unsigned();
            $table->integer('duration')->unsigned();

            $table->foreign('origin_id')->references('id')->on('pools')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('pools')
                ->onUpdate('cascade')->onDelete('cascade');

            // $table->primary(['origin_id', 'destination_id']);
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
        Schema::drop('routes');
        Schema::drop('pools');
    }
}
