<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelHotelBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_hotel_booking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('planner_id')->unsigned()->index();
            $table->foreign('planner_id')->references('id')->on('travel_planner')->onDelete('cascade');
            $table->string('name');
            $table->string('place_name')->nullable();
            $table->string('district')->nullable();
            $table->string('number')->nullable();
            $table->date('arrival_at');
            $table->date('departure_at');
            $table->string('remark')->nullable();
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
        Schema::drop('travel_hotel_booking');
    }
}
