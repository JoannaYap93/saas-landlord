<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMessageTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_message_template', function (Blueprint $table) {
            $table->increments('message_template_id');
            $table->string('message_template_name', 255);
            $table->binary('message_template_content');
            $table->string('message_template_mobile_no', 255)->nullable();
            $table->integer('message_template_status')->nullable();
            $table->dateTime('message_template_created');
            $table->dateTime('message_template_updated');
            $table->integer('admin_id')->nullable();
            $table->integer('is_deleted');
            $table->integer('is_reporting')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_message_template');
    }
}
