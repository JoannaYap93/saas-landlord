<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyLandCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_land_category', function (Blueprint $table) {
            $table->increments('company_land_category_id');
            $table->string('company_land_category_name', 100);
            $table->dateTime('company_land_category_created');
            $table->dateTime('company_land_category_updated');
            $table->boolean('is_deleted')->default(0);
            $table->integer('company_farm_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_land_category');
    }
}
