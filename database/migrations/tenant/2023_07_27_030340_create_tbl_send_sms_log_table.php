<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSendSmsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_send_sms_log', function (Blueprint $table) {
            $table->increments('send_sms_log_id');
            $table->integer('user_id')->default(0);
            $table->string('receiver_mobile', 45)->nullable();
            $table->text('send_sms_log_result')->nullable();
            $table->dateTime('send_sms_log_created');
            $table->integer('tac_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_send_sms_log');
    }
}
