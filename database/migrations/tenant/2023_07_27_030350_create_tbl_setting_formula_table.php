<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingFormulaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_formula', function (Blueprint $table) {
            $table->increments('setting_formula_id');
            $table->string('setting_formula_name', 100)->nullable();
            $table->integer('setting_formula_category_id')->nullable();
            $table->enum('setting_formula_status', ['pending', 'active', 'deleted'])->nullable();
            $table->enum('setting_formula_measurement', ['litre', 'acres', 'pack', 'kg'])->nullable();
            $table->integer('company_id')->nullable();
            $table->dateTime('setting_formula_created')->nullable();
            $table->dateTime('setting_formula_updated')->nullable();
            $table->enum('setting_formula_unit', ['litre', 'kg'])->default('kg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_formula');
    }
}
