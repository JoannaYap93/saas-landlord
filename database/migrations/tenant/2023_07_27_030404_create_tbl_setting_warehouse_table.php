<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_warehouse', function (Blueprint $table) {
            $table->increments('warehouse_id');
            $table->string('warehouse_name', 45);
            $table->enum('warehouse_status', ['active', 'inactive']);
            $table->dateTime('warehouse_cdate');
            $table->dateTime('warehouse_udate');
            $table->string('warehouse_slug', 45);
            $table->integer('warehouse_ranking')->default(0);
            $table->boolean('is_deleted')->default(0);
            $table->integer('company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_warehouse');
    }
}
