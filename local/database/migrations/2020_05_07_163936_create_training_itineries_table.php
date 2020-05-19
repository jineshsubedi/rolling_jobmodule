<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingItineriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_itinery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('training_id')->unsigned()->index();
            $table->foreign('training_id')->references('id')->on('training')->onDelete('cascade');
            $table->date('date');
            $table->string('topic');
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('duration');
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
        Schema::drop('training_itinery');
    }
}
