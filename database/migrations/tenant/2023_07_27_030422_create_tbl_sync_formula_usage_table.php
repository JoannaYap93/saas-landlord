<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSyncFormulaUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sync_formula_usage', function (Blueprint $table) {
            $table->increments('sync_formula_usage_id');
            $table->integer('setting_formula_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('company_land_id')->nullable();
            $table->integer('company_land_zone_id')->nullable();
            $table->decimal('sync_formula_usage_value', 11, 2)->nullable();
            $table->dateTime('sync_formula_usage_created')->nullable();
            $table->dateTime('sync_formula_usage_updated')->nullable();
            $table->enum('sync_formula_usage_status', ['pending', 'completed', 'deleted'])->nullable();
            $table->enum('sync_formula_usage_type', ['drone', 'man'])->nullable();
            $table->integer('formula_usage_id')->nullable();
            $table->integer('sync_id')->nullable();
            $table->date('sync_formula_usage_date')->nullable();
            $table->integer('is_executed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sync_formula_usage');
    }
}
