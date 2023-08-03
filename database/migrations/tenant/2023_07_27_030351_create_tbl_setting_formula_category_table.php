<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingFormulaCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_formula_category', function (Blueprint $table) {
            $table->increments('setting_formula_category_id');
            $table->string('setting_formula_category_name', 100)->nullable();
            $table->boolean('is_budget_limited')->default(0);
            $table->decimal('setting_formula_category_budget', 11, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_formula_category');
    }
}
