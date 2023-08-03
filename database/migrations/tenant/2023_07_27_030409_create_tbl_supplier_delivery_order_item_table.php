<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSupplierDeliveryOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_supplier_delivery_order_item', function (Blueprint $table) {
            $table->increments('supplier_delivery_order_item_id');
            $table->unsignedInteger('supplier_delivery_order_id');
            $table->unsignedInteger('raw_material_id');
            $table->unsignedInteger('raw_material_company_usage_id');
            $table->integer('supplier_delivery_order_item_qty')->nullable();
            $table->decimal('supplier_delivery_order_item_value_per_qty', 11, 2)->nullable();
            $table->decimal('supplier_delivery_order_item_price_per_qty', 11, 2)->nullable();
            $table->decimal('supplier_delivery_order_item_disc', 11, 2)->nullable();
            $table->dateTime('supplier_delivery_order_item_created')->nullable();
            $table->dateTime('supplier_delivery_order_item_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_supplier_delivery_order_item');
    }
}
