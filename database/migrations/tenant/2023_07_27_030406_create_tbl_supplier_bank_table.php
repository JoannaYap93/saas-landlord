<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSupplierBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_supplier_bank', function (Blueprint $table) {
            $table->increments('supplier_bank_id');
            $table->string('supplier_bank_acc_no', 100);
            $table->string('supplier_bank_acc_name', 100);
            $table->unsignedInteger('setting_bank_id');
            $table->unsignedInteger('supplier_id');
            $table->dateTime('supplier_bank_created')->nullable();
            $table->dateTime('supplier_bank_updated')->nullable();
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
        Schema::dropIfExists('tbl_supplier_bank');
    }
}
