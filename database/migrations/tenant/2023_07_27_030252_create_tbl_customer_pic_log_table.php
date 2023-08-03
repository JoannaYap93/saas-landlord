<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCustomerPicLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer_pic_log', function (Blueprint $table) {
            $table->integer('customer_pic_log_id')->primary()->unique();
            $table->integer('customer_pic_id');
            $table->dateTime('customer_pic_log_created');
            $table->dateTime('customer_pic_log_updated');
            $table->string('customer_pic_log_action', 100)->nullable();
            $table->text('customer_pic_log_description')->nullable();
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_customer_pic_log');
    }
}
