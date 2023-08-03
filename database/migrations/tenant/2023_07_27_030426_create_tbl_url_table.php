<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUrlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_url', function (Blueprint $table) {
            $table->integer('url_id')->primary();
            $table->string('url_shorten', 20);
            $table->string('url_full', 150);
            $table->dateTime('url_created');
            $table->integer('url_used');
            $table->dateTime('url_updated');
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
        Schema::dropIfExists('tbl_url');
    }
}
