<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSyncCompanyExpenseWorkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sync_company_expense_worker', function (Blueprint $table) {
            $table->increments('sync_company_expense_worker_id');
            $table->integer('worker_id')->nullable();
            $table->integer('sync_company_expense_id')->nullable();
            $table->json('sync_company_expense_worker_detail')->nullable();
            $table->decimal('sync_company_expense_worker_total', 11, 2)->nullable();
            $table->dateTime('sync_company_expense_worker_created')->nullable();
            $table->dateTime('sync_company_expense_worker_updated')->nullable();
            $table->integer('company_expense_worker_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sync_company_expense_worker');
    }
}
