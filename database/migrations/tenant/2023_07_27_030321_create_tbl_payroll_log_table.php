<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPayrollLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payroll_log', function (Blueprint $table) {
            $table->increments('payroll_log_id');
            $table->integer('payroll_id')->nullable();
            $table->string('payroll_log_action', 45)->nullable();
            $table->string('payroll_log_description', 250)->nullable();
            $table->string('payroll_log_remark', 250)->nullable();
            $table->dateTime('payroll_log_created')->nullable();
            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payroll_log');
    }
}
