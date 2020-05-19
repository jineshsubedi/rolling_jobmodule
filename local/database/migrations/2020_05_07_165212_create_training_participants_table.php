<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_participant', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('training_id')->unsigned()->index();
            $table->foreign('training_id')->references('id')->on('training')->onDelete('cascade');
            $table->integer('staff_id')->unsigned()->index();
            $table->foreign('staff_id')->references('id')->on('adjustment_staff')->onDelete('cascade');
            $table->integer('description')->nullable();
            $table->integer('level')->default(0);
            $table->integer('request_status')->default(0);
            $table->integer('participant_status')->default(0);
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
        Schema::drop('training_participant');
    }
}
