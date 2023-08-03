<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer', function (Blueprint $table) {
            $table->integer('customer_id')->primary();
            $table->string('customer_company_name', 45);
            $table->string('customer_name', 50);
            $table->string('customer_mobile_no', 20);
            $table->string('customer_address', 250);
            $table->string('customer_address2', 250)->nullable();
            $table->string('customer_state', 45);
            $table->string('customer_city', 100);
            $table->string('customer_postcode', 45);
            $table->string('customer_email', 45)->nullable();
            $table->string('customer_code', 100);
            $table->string('customer_country', 45);
            $table->dateTime('customer_created');
            $table->dateTime('customer_updated');
            $table->integer('company_id')->default(0);
            $table->integer('customer_category_id')->default(0);
            $table->tinyInteger('warehouse_id')->nullable();
            $table->string('customer_acc_name', 250)->nullable();
            $table->string('customer_acc_mobile_no', 20)->nullable();
            $table->decimal('customer_credit', 11, 2)->nullable();
            $table->enum('customer_status', ['activate', 'inactivate'])->default('activate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_customer');
    }
}
