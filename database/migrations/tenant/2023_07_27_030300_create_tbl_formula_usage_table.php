<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFormulaUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_formula_usage', function (Blueprint $table) {
            $table->increments('formula_usage_id');
            $table->integer('setting_formula_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('company_land_id')->nullable();
            $table->integer('company_land_zone_id')->default(0);
            $table->decimal('formula_usage_value', 11, 2)->nullable();
            $table->dateTime('formula_usage_created')->nullable();
            $table->dateTime('formula_usage_updated')->nullable();
            $table->enum('formula_usage_status', ['pending', 'completed', 'deleted'])->nullable();
            $table->enum('formula_usage_type', ['drone', 'man'])->nullable();
            $table->integer('sync_id')->nullable();
            $table->date('formula_usage_date')->nullable();
            $table->decimal('formula_usage_total_price', 11, 2)->default(0.00);
            $table->integer('formula_usage_total_tree')->default(0);
            $table->decimal('formula_usage_average_price_per_tree', 11, 2)->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_formula_usage');
    }
}
