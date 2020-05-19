<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelRoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_road', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('planner_id')->unsigned()->index();
            $table->foreign('planner_id')->references('id')->on('travel_planner')->onDelete('cascade');
            $table->string('vehicle_number')->nullable();
            $table->string('driver_number')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('bus_number')->nullable();
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
        Schema::drop('travel_road');
    }
}
