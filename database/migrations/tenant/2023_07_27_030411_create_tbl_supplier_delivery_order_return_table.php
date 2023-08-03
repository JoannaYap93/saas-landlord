<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSupplierDeliveryOrderReturnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_supplier_delivery_order_return', function (Blueprint $table) {
            $table->increments('supplier_delivery_order_return_id');
            $table->integer('supplier_delivery_order_id')->nullable();
            $table->integer('supplier_delivery_order_item_id')->nullable();
            $table->integer('supplier_delivery_order_return_qty')->nullable();
            $table->dateTime('supplier_delivery_order_return_created')->nullable();
            $table->dateTime('supplier_delivery_order_return_updated')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('raw_material_company_usage_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_supplier_delivery_order_return');
    }
}
