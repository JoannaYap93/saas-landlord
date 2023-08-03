<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRawMaterialCompanyUsageLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_raw_material_company_usage_log', function (Blueprint $table) {
            $table->increments('raw_material_company_usage_log_id');
            $table->integer('raw_material_company_usage_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->dateTime('raw_material_company_usage_log_created')->nullable();
            $table->string('raw_material_company_usage_log_action', 100)->nullable();
            $table->string('raw_material_company_usage_log_description', 255)->nullable();
            $table->decimal('raw_material_company_usage_log_value_before', 11, 2)->nullable();
            $table->decimal('raw_material_company_usage_log_value_after', 11, 2)->nullable();
            $table->integer('formula_usage_id')->nullable();
            $table->integer('formula_usage_item_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_raw_material_company_usage_log');
    }
}
