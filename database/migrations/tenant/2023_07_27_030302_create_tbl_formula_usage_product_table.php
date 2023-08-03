<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFormulaUsageProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_formula_usage_product', function (Blueprint $table) {
            $table->increments('formula_usage_product_id');
            $table->integer('product_id')->nullable();
            $table->integer('formula_usage_id')->nullable();
            $table->dateTime('formula_usage_product_created')->nullable();
            $table->json('formula_usage_product_json')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_formula_usage_product');
    }
}
