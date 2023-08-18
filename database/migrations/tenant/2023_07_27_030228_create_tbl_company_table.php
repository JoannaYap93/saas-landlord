<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company', function (Blueprint $table) {
            $table->increments('company_id');
            $table->string('company_name', 150);
            $table->string('company_code', 45);
            $table->dateTime('company_created');
            $table->dateTime('company_updated');
            $table->boolean('company_enable_gst')->default(0);
            $table->boolean('company_force_collect')->default(0);
            $table->string('company_address', 150)->nullable();
            $table->string('company_email', 45)->nullable();
            $table->string('company_reg_no', 45)->nullable();
            $table->string('company_phone', 45)->nullable();
            $table->integer('setting_bank_id')->nullable();
            $table->string('company_bank_acc_name', 250)->nullable();
            $table->string('company_bank_acc_no', 45)->nullable();
            $table->enum('company_status', ['active', 'suspended'])->default('active');
            $table->boolean('is_display')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company');
    }
}
