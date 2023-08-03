<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPayrollItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payroll_item', function (Blueprint $table) {
            $table->increments('payroll_item_id');
            $table->string('payroll_item_name', 100);
            $table->enum('payroll_item_status', ['available', 'unavailable'])->nullable();
            $table->enum('payroll_item_type', ['add', 'deduct']);
            $table->boolean('is_compulsory')->nullable();
            $table->boolean('is_employer')->default(0);
            $table->dateTime('payroll_item_created')->nullable();
            $table->dateTime('payroll_item_updated')->nullable();
            $table->boolean('is_deleted')->default(0);
            $table->integer('setting_expense_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payroll_item');
    }
}
