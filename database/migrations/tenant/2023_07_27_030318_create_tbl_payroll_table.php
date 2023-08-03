<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPayrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payroll', function (Blueprint $table) {
            $table->increments('payroll_id');
            $table->integer('company_id');
            $table->integer('payroll_month')->nullable();
            $table->year('payroll_year', 4)->nullable();
            $table->decimal('payroll_total_amount', 11, 2);
            $table->decimal('payroll_total_reward', 11, 2)->nullable();
            $table->decimal('payroll_total_user_item_employee', 11, 2)->nullable();
            $table->decimal('payroll_total_user_item_employer', 11, 2)->nullable();
            $table->decimal('payroll_grandtotal', 11, 2);
            $table->decimal('payroll_total_paid_out', 11, 2)->nullable();
            $table->enum('payroll_status', ['pending', 'in progress', 'completed', 'deleted'])->nullable();
            $table->dateTime('payroll_created')->nullable();
            $table->dateTime('payroll_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payroll');
    }
}
