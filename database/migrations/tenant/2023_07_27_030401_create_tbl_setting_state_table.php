<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_state', function (Blueprint $table) {
            $table->integer('setting_state_id')->primary();
            $table->string('setting_state_name', 100);
            $table->string('setting_state_code', 3);
            $table->dateTime('setting_state_created');
            $table->dateTime('setting_state_updated');
            $table->boolean('is_deleted');
            $table->integer('setting_country_id');
            $table->string('setting_state_region', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_state');
    }
}
