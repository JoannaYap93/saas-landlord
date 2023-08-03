<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSyncTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sync', function (Blueprint $table) {
            $table->integer('sync_id')->primary();
            $table->dateTime('sync_created');
            $table->dateTime('sync_updated');
            $table->integer('user_id')->index('user_id');
            $table->integer('company_id')->index('company_id');
            $table->string('sync_file_identity', 100)->nullable();
            $table->boolean('is_reverted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sync');
    }
}
