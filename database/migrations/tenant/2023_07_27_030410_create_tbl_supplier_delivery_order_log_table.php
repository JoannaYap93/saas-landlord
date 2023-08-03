<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSupplierDeliveryOrderLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_supplier_delivery_order_log', function (Blueprint $table) {
            $table->increments('supplier_delivery_order_log_id');
            $table->integer('supplier_delivery_order_id')->nullable();
            $table->string('supplier_delivery_order_log_action', 100)->nullable();
            $table->string('supplier_delivery_order_log_description', 255)->nullable();
            $table->dateTime('supplier_delivery_order_log_created')->nullable();
            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_supplier_delivery_order_log');
    }
}
