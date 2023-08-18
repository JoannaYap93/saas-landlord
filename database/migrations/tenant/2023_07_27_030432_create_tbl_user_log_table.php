<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_log', function (Blueprint $table) {
            $table->increments('user_log_id');
            $table->integer('user_id');
            $table->dateTime('user_log_cdate');
            $table->string('user_log_ip', 15)->nullable();
            $table->string('user_log_action', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_log');
    }
}
