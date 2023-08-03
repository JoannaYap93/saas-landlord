<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSyncFormulaUsageItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sync_formula_usage_item', function (Blueprint $table) {
            $table->increments('sync_formula_usage_item_id');
            $table->integer('sync_formula_usage_id')->nullable();
            $table->integer('raw_material_id')->nullable();
            $table->integer('sync_formula_usage_item_qty')->nullable();
            $table->decimal('sync_formula_usage_item_value', 11, 2)->nullable();
            $table->decimal('sync_formula_usage_item_rounding', 11, 2)->nullable();
            $table->decimal('sync_formula_usage_item_total', 11, 2)->nullable();
            $table->dateTime('sync_formula_usage_item_created')->nullable();
            $table->dateTime('sync_formula_usage_item_updated')->nullable();
            $table->integer('formula_usage_item_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sync_formula_usage_item');
    }
}
