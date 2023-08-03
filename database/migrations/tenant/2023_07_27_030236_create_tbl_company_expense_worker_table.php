<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyExpenseWorkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_expense_worker', function (Blueprint $table) {
            $table->increments('company_expense_worker_id');
            $table->integer('worker_id')->nullable();
            $table->integer('company_expense_id')->nullable();
            $table->json('company_expense_worker_detail')->nullable();
            $table->decimal('company_expense_worker_total', 11, 2)->nullable();
            $table->dateTime('company_expense_worker_created')->nullable();
            $table->dateTime('company_expense_worker_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_expense_worker');
    }
}
