<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingTreeAgePointerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_tree_age_pointer', function (Blueprint $table) {
            $table->increments('setting_tree_age_pointer_id');
            $table->integer('product_id')->nullable();
            $table->integer('setting_tree_age_id')->nullable();
            $table->double('setting_tree_age_pointer_value', 11, 2)->nullable();
            $table->dateTime('setting_tree_age_pointer_created')->nullable();
            $table->dateTime('setting_tree_age_pointer_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_tree_age_pointer');
    }
}
