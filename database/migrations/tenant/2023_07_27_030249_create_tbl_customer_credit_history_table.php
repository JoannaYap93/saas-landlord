<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCustomerCreditHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer_credit_history', function (Blueprint $table) {
            $table->increments('customer_credit_history_id');
            $table->integer('customer_id');
            $table->integer('invoice_id');
            $table->decimal('customer_credit_history_value_before', 11, 2);
            $table->decimal('customer_credit_history_value_after', 11, 2);
            $table->enum('customer_credit_history_status', ['pending', 'success', 'failed'])->nullable();
            $table->enum('customer_credit_history_action', ['add', 'deduct']);
            $table->string('customer_credit_history_description', 250);
            $table->string('customer_credit_history_remark', 100)->nullable();
            $table->dateTime('customer_credit_history_created')->nullable();
            $table->dateTime('customer_credit_history_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_customer_credit_history');
    }
}
