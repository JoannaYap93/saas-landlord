<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_payment', function (Blueprint $table) {
            $table->integer('setting_payment_id')->primary();
            $table->string('setting_payment_name', 45)->nullable();
            $table->boolean('is_payment_gateway')->nullable();
            $table->boolean('is_offline')->nullable();
            $table->tinyInteger('setting_payment_status')->nullable();
            $table->string('setting_payment_slug', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_payment');
    }
}
