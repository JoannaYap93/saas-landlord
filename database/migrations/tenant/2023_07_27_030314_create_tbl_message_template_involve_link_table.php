<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMessageTemplateInvolveLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_message_template_involve_link', function (Blueprint $table) {
            $table->increments('message_template_involve_link_id');
            $table->integer('message_template_involve_id')->nullable();
            $table->integer('message_template_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_message_template_involve_link');
    }
}
