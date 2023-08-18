<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMessageLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_message_log', function (Blueprint $table) {
            $table->increments('message_log_id');
            $table->integer('user_id');
            $table->integer('customer_id');
            $table->integer('message_template_id');
            $table->binary('message_log_contents');
            $table->string('message_log_status', 45)->nullable();
            $table->dateTime('message_log_created')->nullable();
            $table->string('message_log_slug', 255)->nullable();
            $table->integer('message_log_ref_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_message_log');
    }
}
