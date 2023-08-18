<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCollectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_collect', function (Blueprint $table) {
            $table->increments('collect_id');
            $table->integer('product_id')->index('product_id');
            $table->integer('setting_product_size_id');
            $table->decimal('collect_quantity', 10, 4);
            $table->dateTime('collect_created');
            $table->dateTime('collect_updated');
            $table->integer('company_id')->index('company_id');
            $table->integer('company_land_id')->index('company_land_id');
            $table->dateTime('collect_date');
            $table->string('collect_code', 100);
            $table->enum('collect_status', ['completed', 'pending', 'delivered', 'deleted'])->default('pending');
            $table->integer('user_id')->default(0)->index('user_id');
            $table->integer('sync_id')->nullable()->index('sync_id');
            $table->string('collect_remark', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_collect');
    }
}
