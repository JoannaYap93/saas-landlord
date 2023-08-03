<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyLandBudgetOverwriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_land_budget_overwrite', function (Blueprint $table) {
            $table->increments('company_land_budget_overwrite_id');
            $table->integer('company_land_id')->nullable();
            $table->enum('company_land_budget_overwrite_type', ['formula', 'expense'])->default('expense');
            $table->decimal('company_land_budget_overwrite_value', 11, 2)->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('company_land_budget_overwrite_type_id')->nullable();
            $table->dateTime('company_land_budget_overwrite_created')->nullable();
            $table->dateTime('company_land_budget_overwrite_updated')->nullable();
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
        Schema::dropIfExists('tbl_company_land_budget_overwrite');
    }
}
