<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSyncFormulaUsageProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sync_formula_usage_product', function (Blueprint $table) {
            $table->increments('sync_formula_usage_product_id');
            $table->integer('product_id')->nullable();
            $table->integer('sync_formula_usage_id')->nullable();
            $table->dateTime('sync_formula_usage_product_created')->nullable();
            $table->integer('formula_usage_product_id')->nullable();
            $table->json('sync_formula_usage_product_json')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sync_formula_usage_product');
    }
}
