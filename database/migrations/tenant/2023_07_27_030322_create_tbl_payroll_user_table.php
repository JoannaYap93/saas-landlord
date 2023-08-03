<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPayrollUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payroll_user', function (Blueprint $table) {
            $table->increments('payroll_user_id');
            $table->integer('payroll_id');
            $table->unsignedInteger('worker_id')->nullable();
            $table->decimal('payroll_user_amount', 11, 2);
            $table->decimal('payroll_user_reward', 11, 2)->default(0.00);
            $table->decimal('payroll_user_item_employee', 11, 2)->nullable();
            $table->decimal('payroll_user_item_employer', 11, 2)->nullable();
            $table->decimal('payroll_user_total', 11, 2)->default(0.00);
            $table->decimal('payroll_user_paid_out', 11, 2)->nullable();
            $table->dateTime('payroll_user_created')->nullable();
            $table->dateTime('payroll_user_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payroll_user');
    }
}
