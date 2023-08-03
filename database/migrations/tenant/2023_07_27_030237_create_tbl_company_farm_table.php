<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyFarmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_farm', function (Blueprint $table) {
            $table->integer('company_farm_id')->primary();
            $table->string('company_farm_name', 45);
            $table->dateTime('company_farm_created');
            $table->dateTime('company_farm_updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_farm');
    }
}
