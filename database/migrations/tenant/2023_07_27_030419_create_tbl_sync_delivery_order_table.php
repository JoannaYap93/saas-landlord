<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSyncDeliveryOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sync_delivery_order', function (Blueprint $table) {
            $table->integer('sync_delivery_order_id')->primary();
            $table->string('sync_delivery_order_no', 45)->nullable();
            $table->decimal('sync_delivery_order_total_quantity', 10, 4);
            $table->string('customer_id', 45);
            $table->string('customer_mobile_no', 20)->nullable();
            $table->string('customer_name', 45)->nullable();
            $table->dateTime('sync_delivery_order_created');
            $table->dateTime('sync_delivery_order_updated');
            $table->integer('sync_id');
            $table->integer('sync_delivery_order_status_id')->default(0);
            $table->integer('is_executed')->default(0);
            $table->string('customer_ic', 45)->nullable();
            $table->dateTime('sync_delivery_order_date');
            $table->integer('sync_delivery_order_type_id');
            $table->integer('company_land_id')->nullable();
            $table->integer('delivery_order_id')->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->string('sync_delivery_order_remark', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sync_delivery_order');
    }
}
