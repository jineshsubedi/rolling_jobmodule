<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_expense', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('travel_id')->unsigned()->index();
            $table->foreign('travel_id')->references('id')->on('travel')->onDelete('cascade');
            $table->date('date');
            $table->integer('type');
            $table->integer('destination_id');
            $table->decimal('ticket')->default(0.0);
            $table->decimal('lodging')->default(0.0);
            $table->decimal('breakfast')->default(0.0);
            $table->decimal('lunch')->default(0.0);
            $table->decimal('dinner')->default(0.0);
            $table->decimal('phone')->default(0.0);
            $table->decimal('local_conveyance')->default(0.0);
            $table->decimal('others')->default(0.0);
            $table->string('total')->nullable();
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
        Schema::drop('travel_expense');
    }
}
