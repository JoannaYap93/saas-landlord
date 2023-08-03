<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product_category', function (Blueprint $table) {
            $table->integer('product_category_id')->primary();
            $table->integer('product_category_parent_id')->nullable();
            $table->string('product_category_name', 45);
            $table->integer('product_category_ranking')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->dateTime('product_category_created');
            $table->dateTime('product_category_updated');
            $table->string('product_category_slug', 45);
            $table->string('product_category_status', 45)->nullable();
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
        Schema::dropIfExists('tbl_product_category');
    }
}
