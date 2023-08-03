<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyLandTreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_land_tree', function (Blueprint $table) {
            $table->increments('company_land_tree_id');
            $table->integer('company_land_id')->nullable();
            $table->integer('company_land_zone_id')->nullable();
            $table->string('company_land_tree_no', 30)->nullable();
            $table->integer('product_id')->nullable();
            $table->double('company_land_tree_circumference');
            $table->string('company_land_tree_age', 45)->nullable();
            $table->integer('company_land_tree_year')->nullable();
            $table->boolean('is_sick')->default(0);
            $table->boolean('is_bear_fruit')->default(0);
            $table->enum('company_land_tree_status', ['alive', 'dead', 'saw off']);
            $table->string('company_pnl_sub_item_code', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_land_tree');
    }
}
