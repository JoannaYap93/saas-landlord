<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPaymentUrlItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payment_url_item', function (Blueprint $table) {
            $table->increments('payment_url_item_id');
            $table->integer('payment_url_id');
            $table->integer('invoice_id')->nullable();
            $table->decimal('invoice_total', 11, 2)->nullable();
            $table->dateTime('payment_url_item_created')->nullable();
            $table->dateTime('payment_url_item_updated')->nullable();
            $table->boolean('is_deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payment_url_item');
    }
}
