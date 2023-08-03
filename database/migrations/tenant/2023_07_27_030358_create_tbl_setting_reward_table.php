<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingRewardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_reward', function (Blueprint $table) {
            $table->increments('setting_reward_id');
            $table->string('setting_reward_name', 100);
            $table->string('setting_reward_slug', 45);
            $table->string('setting_reward_description', 250);
            $table->unsignedInteger('setting_reward_category_id');
            $table->json('setting_reward_json')->nullable();
            $table->enum('setting_reward_status', ['active', 'pending'])->nullable();
            $table->integer('company_id')->nullable();
            $table->boolean('is_default')->default(0);
            $table->dateTime('setting_reward_created')->nullable();
            $table->dateTime('setting_reward_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_reward');
    }
}
