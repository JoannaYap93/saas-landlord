<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingTreeAgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_tree_age', function (Blueprint $table) {
            $table->increments('setting_tree_age_id');
            $table->integer('setting_tree_age')->nullable();
            $table->double('setting_tree_age_lower_circumference')->nullable();
            $table->double('setting_tree_age_upper_circumference')->nullable();
            $table->dateTime('setting_tree_age_created');
            $table->dateTime('setting_tree_age_updated')->nullable();
            $table->string('company_pnl_sub_item_code', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_tree_age');
    }
}
