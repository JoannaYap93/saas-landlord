<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInvoicePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_invoice_payment', function (Blueprint $table) {
            $table->integer('invoice_payment_id')->primary();
            $table->integer('invoice_id');
            $table->decimal('invoice_payment_amount', 12, 2)->default(0.00);
            $table->date('invoice_payment_date');
            $table->dateTime('invoice_payment_created');
            $table->dateTime('invoice_payment_updated');
            $table->text('invoice_payment_data')->nullable();
            $table->boolean('is_deleted')->default(0);
            $table->integer('setting_payment_id');
            $table->text('invoice_payment_remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_invoice_payment');
    }
}
