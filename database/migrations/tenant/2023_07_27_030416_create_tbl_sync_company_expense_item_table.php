<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSyncCompanyExpenseItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sync_company_expense_item', function (Blueprint $table) {
            $table->increments('sync_company_expense_item_id');
            $table->integer('sync_company_expense_id')->nullable();
            $table->integer('setting_expense_id')->nullable();
            $table->json('sync_company_expense_item_detail')->nullable();
            $table->integer('sync_company_expense_item_unit')->nullable();
            $table->decimal('sync_company_expense_item_unit_price', 11, 2)->nullable();
            $table->decimal('sync_company_expense_item_total', 11, 2)->nullable();
            $table->dateTime('sync_company_expense_item_created')->nullable();
            $table->dateTime('sync_company_expense_item_updated')->nullable();
            $table->integer('company_expense_item_id')->nullable();
            $table->boolean('is_claim')->nullable();
            $table->integer('sync_supplier_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sync_company_expense_item');
    }
}
