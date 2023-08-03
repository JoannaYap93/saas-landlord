<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingSecurityPinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_security_pin', function (Blueprint $table) {
            $table->integer('setting_security_pin_id')->primary();
            $table->string('setting_security_pin', 100);
            $table->dateTime('setting_security_pin_created');
            $table->dateTime('setting_security_pin_updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_security_pin');
    }
}
