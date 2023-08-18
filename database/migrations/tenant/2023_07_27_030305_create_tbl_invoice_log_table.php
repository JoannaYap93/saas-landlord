<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInvoiceLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_invoice_log', function (Blueprint $table) {
            $table->increments('invoice_log_id');
            $table->integer('invoice_id');
            $table->dateTime('invoice_log_created');
            $table->text('invoice_log_description')->nullable();
            $table->string('invoice_log_action', 100)->nullable();
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
        Schema::dropIfExists('tbl_invoice_log');
    }
}
