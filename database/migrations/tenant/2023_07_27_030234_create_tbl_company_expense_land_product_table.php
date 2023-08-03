<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyExpenseLandProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_expense_land_product', function (Blueprint $table) {
            $table->increments('company_expense_land_product_id');
            $table->integer('company_land_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('setting_tree_age')->nullable();
            $table->integer('setting_expense_id')->nullable();
            $table->decimal('company_expense_land_product_cost_per_tree', 11, 2)->nullable();
            $table->integer('company_expense_land_product_tree')->nullable();
            $table->integer('company_expense_land_id')->nullable();
            $table->integer('company_expense_id')->nullable();
            $table->decimal('company_expense_land_product_total_cost', 11, 2)->nullable();
            $table->dateTime('company_expense_land_product_created')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_expense_land_product');
    }
}
