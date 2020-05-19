<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id')->unsigned()->index();
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('cascade');
            $table->integer('assigned_to');
            $table->enum('type', ['domestic', 'international']);
            $table->integer('assigned_from');
            $table->string('purpose');
            $table->enum('mode_of_transport', ['road', 'air', 'water']);
            $table->integer('assignment_type');
            $table->integer('assignment_category');
            $table->integer('payment_mode');
            $table->integer('road_sub')->nullable();
            $table->integer('reimbursement')->nullable();
            $table->integer('position')->nullable();
            $table->integer('grade')->nullable();   
            $table->integer('per_diem_amount')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->integer('supervisor_approval')->default(0);
            $table->string('supervisor_remark')->nullable();
            $table->integer('account_approval')->default(0);
            $table->string('account_remark')->nullable();
            $table->integer('hr_approval')->default(0);
            $table->string('hr_remark')->nullable();
            $table->integer('chairman_approval')->default(0);
            $table->string('chairman_remark')->nullable();
            $table->integer('supervisor_expense_approval')->default(0);
            $table->string('superviso_expenser_remark')->nullable();
            $table->integer('account_expense_approval')->default(0);
            $table->string('account_expense_remark')->nullable();
            $table->integer('hr_expense_approval')->default(0);
            $table->string('hr_expense_remark')->nullable();
            $table->integer('chairman_expense_approval')->default(0);
            $table->string('chairman_expense_remark')->nullable();
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
        Schema::drop('travel');
    }
}
