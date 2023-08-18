<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_banner', function (Blueprint $table) {
            $table->increments('setting_banner_id');
            $table->string('setting_banner_name', 45)->nullable();
            $table->enum('setting_banner_status', ['draft', 'published', 'deleted'])->default('draft');
            $table->integer('setting_banner_priority')->nullable();
            $table->dateTime('setting_banner_created');
            $table->dateTime('setting_banner_updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_banner');
    }
}
