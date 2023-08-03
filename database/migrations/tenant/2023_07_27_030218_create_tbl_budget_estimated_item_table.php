<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBudgetEstimatedItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_budget_estimated_item', function (Blueprint $table) {
            $table->increments('budget_estimated_item_id');
            $table->integer('budget_estimated_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('budget_estimated_item_month')->nullable();
            $table->integer('budget_estimated_item_year')->nullable();
            $table->enum('budget_estimated_item_type', ['product_id', 'setting_expense_id'])->nullable();
            $table->integer('budget_estimated_item_type_value')->nullable();
            $table->decimal('budget_estimated_item_amount', 11, 2)->nullable();
            $table->dateTime('budget_estimated_item_created')->nullable();
            $table->dateTime('budget_estimated_item_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_budget_estimated_item');
    }
}
