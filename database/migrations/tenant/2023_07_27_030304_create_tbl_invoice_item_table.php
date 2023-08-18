<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInvoiceItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_invoice_item', function (Blueprint $table) {
            $table->increments('invoice_item_id');
            $table->integer('invoice_id');
            $table->integer('product_id');
            $table->integer('setting_product_size_id');
            $table->string('invoice_item_name', 45);
            $table->string('invoice_item_price', 45);
            $table->decimal('invoice_item_quantity', 12, 4)->default(0.0000);
            $table->decimal('invoice_item_subtotal', 10, 2)->default(0.00);
            $table->decimal('invoice_item_discount', 10, 2)->default(0.00);
            $table->decimal('invoice_item_total', 10, 2)->default(0.00);
            $table->dateTime('invoice_item_created');
            $table->dateTime('invoice_item_updated');
            $table->integer('delivery_order_item_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_invoice_item');
    }
}
