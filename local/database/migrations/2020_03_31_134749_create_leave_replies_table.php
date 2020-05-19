<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_reply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('leave_request_id')->unsigned()->index();
            $table->foreign('leave_request_id')->references('id')->on('leave_request')->onDelete('cascade');
            $table->string('detail');
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
        Schema::drop('leave_reply');
    }
}
