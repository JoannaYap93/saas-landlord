<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPaymentUrlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payment_url', function (Blueprint $table) {
            $table->increments('payment_url_id');
            $table->integer('customer_id')->nullable();
            $table->decimal('payment_url_total', 11, 2)->nullable();
            $table->dateTime('payment_url_created')->nullable();
            $table->dateTime('payment_url_updated')->nullable();
            $table->enum('payment_url_status', ['pending', 'pending approval', 'paid', 'cancelled'])->default('Pending');
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
        Schema::dropIfExists('tbl_payment_url');
    }
}
