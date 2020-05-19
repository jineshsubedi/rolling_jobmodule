<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelAirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_air', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('planner_id')->unsigned()->index();
            $table->foreign('planner_id')->references('id')->on('travel_planner')->onDelete('cascade');
            $table->string('airline_name');
            $table->string('flight_number');
            $table->date('departure_on');
            $table->string('arrival_on');
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
        Schema::drop('travel_air');
    }
}
