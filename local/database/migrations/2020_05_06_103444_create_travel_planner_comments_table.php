<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelPlannerCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_planner_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('planner_id')->unsigned()->index();
            $table->foreign('planner_id')->references('id')->on('travel_planner')->onDelete('cascade');
            $table->text('detail');
            $table->integer('reply_by');
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
        Schema::drop('travel_planner_comment');
    }
}
