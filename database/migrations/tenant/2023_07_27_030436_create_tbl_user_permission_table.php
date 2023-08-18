<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_permission', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('guard_name', 100);
            $table->timestamps();
            $table->string('group_name', 50);
            $table->string('display_name', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_permission');
    }
}
