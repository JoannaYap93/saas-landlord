<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyExpenseLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_expense_log', function (Blueprint $table) {
            $table->increments('company_expense_log_id');
            $table->integer('company_expense_id')->nullable();
            $table->dateTime('company_expense_log_created')->nullable();
            $table->text('company_expense_log_description')->nullable();
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
        Schema::dropIfExists('tbl_company_expense_log');
    }
}
