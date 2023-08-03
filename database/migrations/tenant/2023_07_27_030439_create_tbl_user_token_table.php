<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserTokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_token', function (Blueprint $table) {
            $table->increments('user_token_id');
            $table->string('user_token', 100)->default('');
            $table->integer('user_id')->nullable();
            $table->boolean('is_active')->default(0);
            $table->dateTime('user_token_created')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_token');
    }
}
