<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPayrollItemWorkerRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payroll_item_worker_role', function (Blueprint $table) {
            $table->increments('payroll_item_worker_role_id');
            $table->unsignedInteger('payroll_item_id');
            $table->unsignedInteger('worker_role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payroll_item_worker_role');
    }
}
