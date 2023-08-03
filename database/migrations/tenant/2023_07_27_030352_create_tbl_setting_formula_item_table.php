<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingFormulaItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_formula_item', function (Blueprint $table) {
            $table->increments('setting_formula_item_id');
            $table->integer('setting_formula_id')->nullable();
            $table->string('setting_formula_item_name', 100)->nullable();
            $table->integer('raw_material_id')->nullable();
            $table->decimal('setting_formula_item_value', 11, 2)->nullable();
            $table->dateTime('setting_formula_item_created')->nullable();
            $table->dateTime('setting_formula_item_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_formula_item');
    }
}
