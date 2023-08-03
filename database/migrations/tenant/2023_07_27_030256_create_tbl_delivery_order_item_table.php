<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDeliveryOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_delivery_order_item', function (Blueprint $table) {
            $table->increments('delivery_order_item_id');
            $table->integer('delivery_order_id');
            $table->integer('product_id');
            $table->integer('setting_product_size_id');
            $table->decimal('delivery_order_item_quantity', 10, 4);
            $table->dateTime('delivery_order_item_created');
            $table->dateTime('delivery_order_item_updated');
            $table->string('delivery_order_item_collect_no', 100)->nullable();
            $table->integer('invoice_item_id')->nullable();
            $table->decimal('delivery_order_item_price_per_kg', 11, 2)->nullable();
            $table->boolean('no_collect_code')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_delivery_order_item');
    }
}
