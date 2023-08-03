<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyLandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_land', function (Blueprint $table) {
            $table->integer('company_land_id')->primary();
            $table->string('company_land_name', 150);
            $table->integer('company_land_category_id')->default(0);
            $table->integer('company_id');
            $table->string('company_land_code', 25);
            $table->dateTime('company_land_created');
            $table->dateTime('company_land_updated');
            $table->integer('company_bank_id')->nullable();
            $table->integer('company_land_total_tree')->nullable();
            $table->decimal('company_land_total_acre', 11, 2)->nullable();
            $table->boolean('is_overwrite_budget')->default(0);
            $table->decimal('overwrite_budget_per_tree', 11, 2)->nullable();
            
            $table->index(['company_id', 'company_land_id'], 'company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_land');
    }
}
