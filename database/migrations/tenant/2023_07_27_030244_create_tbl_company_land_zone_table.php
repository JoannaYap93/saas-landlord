<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyLandZoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_land_zone', function (Blueprint $table) {
            $table->increments('company_land_zone_id');
            $table->string('company_land_zone_name', 100)->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('company_land_id')->nullable();
            $table->integer('company_land_zone_total_tree')->nullable();
            $table->dateTime('company_land_zone_created')->nullable();
            $table->dateTime('company_land_zone_updated')->nullable();
            $table->boolean('is_delete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_land_zone');
    }
}
