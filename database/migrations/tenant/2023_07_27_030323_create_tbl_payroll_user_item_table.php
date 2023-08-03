<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPayrollUserItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payroll_user_item', function (Blueprint $table) {
            $table->increments('payroll_user_item_id');
            $table->integer('payroll_item_id');
            $table->integer('payroll_user_id');
            $table->enum('payroll_item_type', ['employee', 'employer'])->default('employee');
            $table->decimal('payroll_user_item_amount', 11, 2);
            $table->dateTime('payroll_user_item_created')->nullable();
            $table->dateTime('payroll_user_item_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payroll_user_item');
    }
}
