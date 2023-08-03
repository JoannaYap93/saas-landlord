<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFormulaUsageItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_formula_usage_item', function (Blueprint $table) {
            $table->increments('formula_usage_item_id');
            $table->integer('formula_usage_id')->nullable();
            $table->integer('raw_material_id')->nullable();
            $table->integer('formula_usage_item_qty')->nullable();
            $table->decimal('formula_usage_item_value', 11, 2)->nullable();
            $table->decimal('formula_usage_item_rounding', 11, 2)->nullable();
            $table->decimal('formula_usage_item_total', 11, 2)->nullable();
            $table->dateTime('formula_usage_item_created')->nullable();
            $table->dateTime('formula_usage_item_updated')->nullable();
            $table->decimal('formula_usage_item_unit_price', 11, 2)->default(0.00);
            $table->decimal('formula_usage_item_total_price', 11, 2)->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_formula_usage_item');
    }
}
