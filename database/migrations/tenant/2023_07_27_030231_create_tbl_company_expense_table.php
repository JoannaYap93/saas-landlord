<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_expense', function (Blueprint $table) {
            $table->increments('company_expense_id');
            $table->integer('setting_expense_category_id')->nullable();
            $table->string('company_expense_number', 100)->nullable();
            $table->integer('company_land_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('worker_id')->default(0);
            $table->decimal('company_expense_total', 11, 2)->nullable();
            $table->integer('company_id')->nullable();
            $table->enum('company_expense_type', ['daily', 'monthly'])->nullable();
            $table->dateTime('company_expense_created')->nullable();
            $table->dateTime('company_expense_updated')->nullable();
            $table->integer('company_expense_day')->nullable();
            $table->integer('company_expense_month')->nullable();
            $table->integer('company_expense_year')->nullable();
            $table->enum('company_expense_status', ['completed', 'deleted'])->default('completed');
            $table->integer('sync_id')->nullable();
            $table->integer('worker_role_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_expense');
    }
}
