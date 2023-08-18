<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSyncCollectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sync_collect', function (Blueprint $table) {
            $table->increments('sync_collect_id');
            $table->integer('product_id')->nullable();
            $table->integer('setting_product_size_id')->nullable();
            $table->decimal('sync_collect_quantity', 10, 4)->nullable();
            $table->dateTime('sync_collect_created')->nullable();
            $table->dateTime('sync_collect_updated')->nullable();
            $table->integer('sync_id')->nullable();
            $table->integer('is_executed')->nullable();
            $table->integer('company_land_id')->nullable();
            $table->dateTime('sync_collect_date')->nullable();
            $table->string('sync_collect_code', 100)->nullable();
            $table->integer('user_id')->nullable();
            $table->enum('sync_collect_status', ['pending', 'completed', 'delivered', 'deleted'])->nullable();
            $table->string('sync_collect_remark', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sync_collect');
    }
}
