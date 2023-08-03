<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDeliveryOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_delivery_order', function (Blueprint $table) {
            $table->integer('delivery_order_id')->primary();
            $table->string('delivery_order_no', 45)->nullable();
            $table->dateTime('delivery_order_created');
            $table->dateTime('delivery_order_updated');
            $table->integer('customer_id')->nullable()->index('customer_id');
            $table->string('customer_name', 100)->nullable();
            $table->string('customer_mobile_no', 20)->nullable();
            $table->string('customer_ic', 25)->nullable();
            $table->decimal('delivery_order_total_quantity', 10, 4);
            $table->integer('sync_id')->nullable()->index('sync_id');
            $table->integer('delivery_order_status_id')->nullable();
            $table->integer('company_id')->nullable()->index('company_id');
            $table->integer('company_land_id')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->integer('delivery_order_type_id');
            $table->integer('user_id')->index('user_id');
            $table->integer('warehouse_id')->nullable();
            $table->string('delivery_order_remark', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_delivery_order');
    }
}
