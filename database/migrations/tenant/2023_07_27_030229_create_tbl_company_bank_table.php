<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_bank', function (Blueprint $table) {
            $table->increments('company_bank_id');
            $table->string('company_bank_acc_name', 100)->nullable();
            $table->string('company_bank_acc_no', 100)->nullable();
            $table->integer('setting_bank_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->dateTime('company_bank_created')->nullable();
            $table->dateTime('company_bank_updated')->nullable();
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
        Schema::dropIfExists('tbl_company_bank');
    }
}
