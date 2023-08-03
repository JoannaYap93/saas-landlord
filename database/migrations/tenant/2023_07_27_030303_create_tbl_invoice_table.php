<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_invoice', function (Blueprint $table) {
            $table->integer('invoice_id')->primary();
            $table->integer('customer_id');
            $table->string('customer_name', 150);
            $table->string('customer_address', 250);
            $table->string('customer_address2', 250)->nullable();
            $table->string('customer_state', 45);
            $table->string('customer_city', 100);
            $table->string('customer_postcode', 45);
            $table->string('customer_country', 45);
            $table->decimal('invoice_subtotal', 10, 2)->default(0.00);
            $table->decimal('invoice_total_discount', 10, 2)->default(0.00);
            $table->decimal('invoice_total', 10, 2)->default(0.00);
            $table->decimal('invoice_total_gst', 10, 2);
            $table->decimal('invoice_total_round_up', 6, 2)->nullable();
            $table->decimal('invoice_grandtotal', 10, 2)->default(0.00);
            $table->decimal('invoice_amount_paid', 10, 2)->nullable();
            $table->decimal('invoice_amount_remaining', 10, 2)->nullable();
            $table->integer('company_id');
            $table->integer('company_land_id');
            $table->integer('company_bank_id');
            $table->integer('invoice_status_id');
            $table->integer('user_id');
            $table->string('invoice_no', 100)->nullable();
            $table->dateTime('invoice_created');
            $table->dateTime('invoice_updated');
            $table->boolean('is_approved')->default(0);
            $table->date('is_approved_date')->nullable();
            $table->dateTime('invoice_date')->nullable();
            $table->string('invoice_remark', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_invoice');
    }
}
