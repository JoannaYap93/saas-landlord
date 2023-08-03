<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRawMaterialCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_raw_material_company', function (Blueprint $table) {
            $table->increments('raw_material_company_id');
            $table->integer('raw_material_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('raw_material_quantity')->nullable();
            $table->decimal('raw_material_value', 11, 2)->nullable();
            $table->dateTime('raw_material_company_created')->nullable();
            $table->dateTime('raw_material_company_updated')->nullable();
            $table->enum('raw_material_company_status', ['active', 'inactive'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_raw_material_company');
    }
}
