<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_material', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id')->unsigned()->index();
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('cascade');
            $table->integer('program_id')->nullable();
            $table->string('title')->nullable();
            $table->integer('type');
            $table->integer('publish_by')->unsigned()->index();
            $table->foreign('publish_by')->references('id')->on('adjustment_staff')->onDelete('cascade');
            $table->string('document');
            $table->string('doc_type');
            $table->string('approval')->default(0);
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
        Schema::drop('training_material');
    }
}
