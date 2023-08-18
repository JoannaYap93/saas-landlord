<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductStockWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product_stock_warehouse', function (Blueprint $table) {
            $table->increments('product_stock_warehouse_id');
            $table->integer('warehouse_id');
            $table->integer('product_id');
            $table->integer('setting_product_size_id');
            $table->integer('product_stock_warehouse_qty_current');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product_stock_warehouse');
    }
}
