<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSyncProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sync_product', function (Blueprint $table) {
            $table->integer('sync_product_id')->primary();
            $table->integer('product_id');
            $table->integer('sync_id');
            $table->decimal('sync_product_quantity', 10, 4);
            $table->dateTime('sync_product_created');
            $table->dateTime('sync_product_updated');
            $table->date('sync_product_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sync_product');
    }
}
