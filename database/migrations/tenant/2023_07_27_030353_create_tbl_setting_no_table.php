<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingNoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_no', function (Blueprint $table) {
            $table->integer('setting_no_id')->primary();
            $table->string('setting_no_slug', 45)->nullable();
            $table->integer('setting_no_year')->nullable();
            $table->integer('setting_no_month')->nullable();
            $table->integer('setting_no')->nullable();
            $table->integer('company_id')->nullable();
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
        Schema::dropIfExists('tbl_setting_no');
    }
}
