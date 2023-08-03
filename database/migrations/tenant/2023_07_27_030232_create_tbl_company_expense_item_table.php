<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyExpenseItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_expense_item', function (Blueprint $table) {
            $table->increments('company_expense_item_id');
            $table->integer('company_expense_id')->nullable();
            $table->integer('setting_expense_id')->nullable();
            $table->json('company_expense_item_detail')->nullable();
            $table->integer('company_expense_item_unit')->nullable();
            $table->decimal('company_expense_item_unit_price', 11, 2)->nullable();
            $table->decimal('company_expense_item_total', 11, 2)->nullable();
            $table->dateTime('company_expense_item_created')->nullable();
            $table->dateTime('company_expense_item_updated')->nullable();
            $table->boolean('is_claim')->default(0);
            $table->integer('user_wallet_history_id')->nullable();
            $table->unsignedInteger('worker_wallet_history_id')->nullable();
            $table->decimal('claim_remaining_amount', 11, 2)->nullable();
            $table->decimal('company_expense_item_average_price_per_tree', 11, 2)->nullable();
            $table->integer('supplier_id')->nullable();
            $table->string('remark', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_expense_item');
    }
}
