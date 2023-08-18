<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product_tag', function (Blueprint $table) {
            $table->increments('product_tag_id');
            $table->string('product_tag_name', 45);
            $table->dateTime('product_tag_created');
            $table->dateTime('product_tag_updated');
            $table->enum('product_tag_status', ['draft', 'published', 'deleted'])->default('draft');
            $table->string('product_tag_slug', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product_tag');
    }
}
