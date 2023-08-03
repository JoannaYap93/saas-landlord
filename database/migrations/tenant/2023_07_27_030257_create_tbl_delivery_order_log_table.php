<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDeliveryOrderLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_delivery_order_log', function (Blueprint $table) {
            $table->increments('delivery_order_log_id');
            $table->integer('delivery_order_id')->nullable();
            $table->dateTime('delivery_order_log_created')->nullable();
            $table->string('delivery_order_log_action', 100)->nullable();
            $table->text('delivery_order_log_description')->nullable();
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
        Schema::dropIfExists('tbl_delivery_order_log');
    }
}
