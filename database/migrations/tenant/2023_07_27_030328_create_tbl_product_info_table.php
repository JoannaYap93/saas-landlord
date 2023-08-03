<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product_info', function (Blueprint $table) {
            $table->increments('product_info_id');
            $table->integer('product_id');
            $table->integer('setting_product_size_id');
            $table->integer('company_farm_id');
            $table->date('product_info_date');
            $table->decimal('product_info_price', 11, 2);
            $table->dateTime('product_info_created');
            $table->boolean('is_deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product_info');
    }
}
