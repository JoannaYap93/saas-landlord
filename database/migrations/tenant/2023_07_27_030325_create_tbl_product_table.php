<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name', 45)->default('');
            $table->string('product_remarks', 45)->nullable();
            $table->text('product_description')->nullable();
            $table->string('product_sku', 45)->nullable();
            $table->integer('is_deleted');
            $table->dateTime('product_created');
            $table->dateTime('product_updated');
            $table->string('product_slug', 45);
            $table->integer('product_status_id');
            $table->integer('product_ranking')->nullable();
            $table->integer('product_category_id');
            $table->integer('company_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product');
    }
}
