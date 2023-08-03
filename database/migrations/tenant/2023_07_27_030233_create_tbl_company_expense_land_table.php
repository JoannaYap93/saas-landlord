<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyExpenseLandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_expense_land', function (Blueprint $table) {
            $table->increments('company_expense_land_id');
            $table->integer('company_expense_id');
            $table->integer('company_land_id')->nullable();
            $table->integer('company_expense_land_total_tree')->nullable();
            $table->decimal('company_expense_land_total_price', 11, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_expense_land');
    }
}
