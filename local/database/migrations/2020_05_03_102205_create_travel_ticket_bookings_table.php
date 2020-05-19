<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelTicketBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_ticket_booking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('planner_id')->unsigned()->index();
            $table->foreign('planner_id')->references('id')->on('travel_planner')->onDelete('cascade');
            $table->integer('type')->comment('road,air ways ticket booking');
            $table->string('vehicle_number')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('driver_number')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('bus_number')->nullable();
            $table->string('airline_name')->nullable();
            $table->string('flight_number')->nullable();
            $table->string('departure_on')->nullable();
            $table->string('arrival_on')->nullable();
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
        Schema::drop('travel_ticket_booking');
    }
}
