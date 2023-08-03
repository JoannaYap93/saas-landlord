<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPaymentUrlLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payment_url_log', function (Blueprint $table) {
            $table->increments('payment_url_log_id');
            $table->integer('payment_url_id')->nullable();
            $table->string('payment_url_log_action', 100)->nullable();
            $table->string('payment_url_log_description', 250)->nullable();
            $table->dateTime('payment_url_log_created')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('customer_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payment_url_log');
    }
}
