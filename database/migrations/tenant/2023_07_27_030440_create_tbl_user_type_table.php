<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_type', function (Blueprint $table) {
            $table->integer('user_type_id')->primary();
            $table->string('user_type_name', 45);
            $table->dateTime('user_type_cdate');
            $table->dateTime('user_type_udate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_type');
    }
}
