<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_supplier', function (Blueprint $table) {
            $table->increments('supplier_id');
            $table->string('supplier_name', 100);
            $table->string('supplier_mobile_no', 45);
            $table->string('supplier_phone_no', 45)->nullable();
            $table->string('supplier_email', 50)->nullable();
            $table->string('supplier_address', 250)->nullable();
            $table->string('supplier_address2', 250)->nullable();
            $table->string('supplier_city', 100)->nullable();
            $table->string('supplier_state', 50)->nullable();
            $table->string('supplier_country', 100)->nullable();
            $table->string('supplier_postcode', 10)->nullable();
            $table->enum('supplier_status', ['active', 'inactive'])->nullable();
            $table->string('supplier_pic', 45)->nullable();
            $table->string('supplier_currency', 3)->nullable();
            $table->decimal('supplier_credit_limit', 11, 2)->nullable();
            $table->integer('supplier_credit_term')->nullable();
            $table->dateTime('supplier_created')->nullable();
            $table->dateTime('supplier_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_supplier');
    }
}
