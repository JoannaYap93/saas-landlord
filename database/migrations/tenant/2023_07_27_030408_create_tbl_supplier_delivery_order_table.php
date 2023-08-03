<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSupplierDeliveryOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_supplier_delivery_order', function (Blueprint $table) {
            $table->increments('supplier_delivery_order_id');
            $table->string('supplier_delivery_order_no', 100);
            $table->string('supplier_delivery_order_running_no', 100);
            $table->decimal('supplier_delivery_order_subtotal', 11, 2)->default(0.00);
            $table->decimal('supplier_delivery_order_discount', 11, 2);
            $table->decimal('supplier_delivery_order_total', 11, 2)->default(0.00);
            $table->decimal('supplier_delivery_order_tax', 11, 2)->default(0.00);
            $table->decimal('supplier_delivery_order_grandtotal', 11, 2);
            $table->enum('supplier_delivery_order_status', ['completed', 'partially returned', 'returned', 'deleted'])->nullable();
            $table->date('supplier_delivery_order_date');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('user_id');
            $table->dateTime('supplier_delivery_order_created')->nullable();
            $table->dateTime('supplier_delivery_order_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_supplier_delivery_order');
    }
}
