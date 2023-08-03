<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSyncDeliveryOrderLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sync_delivery_order_log', function (Blueprint $table) {
            $table->integer('sync_delivery_order_log_id')->primary();
            $table->integer('sync_delivery_order_id');
            $table->dateTime('sync_delivery_order_log_created');
            $table->string('sync_delivery_order_log_action', 100);
            $table->text('sync_delivery_order_log_description')->nullable();
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sync_delivery_order_log');
    }
}
