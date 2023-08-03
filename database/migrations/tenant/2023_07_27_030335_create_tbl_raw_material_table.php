<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRawMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_raw_material', function (Blueprint $table) {
            $table->increments('raw_material_id');
            $table->text('raw_material_name')->nullable();
            $table->integer('raw_material_category_id')->nullable();
            $table->dateTime('raw_material_created')->nullable();
            $table->dateTime('raw_material_updated')->nullable();
            $table->enum('raw_material_status', ['active', 'pending', 'deleted'])->nullable();
            $table->enum('raw_material_quantity_unit', ['bottle', 'pack'])->nullable();
            $table->enum('raw_material_value_unit', ['litre', 'kg'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_raw_material');
    }
}
