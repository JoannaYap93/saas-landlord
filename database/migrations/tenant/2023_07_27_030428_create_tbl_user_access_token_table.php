<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserAccessTokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_access_token', function (Blueprint $table) {
            $table->id();
            $table->string('tokenable_type', 255)->nullable();
            $table->unsignedBigInteger('tokenable_id')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('token', 64)->nullable();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_access_token');
    }
}
