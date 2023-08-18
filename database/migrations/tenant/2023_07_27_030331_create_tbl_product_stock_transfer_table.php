<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductStockTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product_stock_transfer', function (Blueprint $table) {
            $table->increments('product_stock_transfer_id');
            $table->string('product_stock_transfer_description', 45);
            $table->string('product_stock_transfer_remark', 45)->nullable();
            $table->integer('product_stock_transfer_qty');
            $table->integer('product_stock_transfer_qty_before');
            $table->integer('product_stock_transfer_qty_after');
            $table->string('product_stock_transfer_status', 45)->nullable();
            $table->string('product_stock_transfer_action', 45)->nullable();
            $table->integer('product_stock_warehouse_id');
            $table->dateTime('product_stock_transfer_updated');
            $table->dateTime('product_stock_transfer_created');
            $table->integer('setting_product_size_id');
            $table->integer('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product_stock_transfer');
    }
}
