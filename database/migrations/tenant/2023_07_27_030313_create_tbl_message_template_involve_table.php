<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMessageTemplateInvolveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_message_template_involve', function (Blueprint $table) {
            $table->increments('message_template_involve_id');
            $table->string('message_template_involve_slug', 100)->nullable();
            $table->dateTime('message_template_involve_created');
            $table->dateTime('message_template_involve_updated');
            $table->integer('is_deleted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_message_template_involve');
    }
}
