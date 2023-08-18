<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCustomerLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer_log', function (Blueprint $table) {
            $table->increments('customer_log_id');
            $table->integer('customer_id');
            $table->dateTime('customer_log_created');
            $table->dateTime('customer_log_updated');
            $table->string('customer_log_action', 100)->nullable();
            $table->text('customer_log_description')->nullable();
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
        Schema::dropIfExists('tbl_customer_log');
    }
}
