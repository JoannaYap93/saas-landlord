<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro Laravel Export (1.6.0)
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreateTblUserLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_log', function (Blueprint $table) {
            $table->increments('user_log_id');
            $table->integer('user_id');
            $table->dateTime('user_log_cdate');
            $table->string('user_log_ip', 15)->charset('latin1')->collation('latin1_swedish_ci');
            $table->string('user_log_action', 45)->charset('latin1')->collation('latin1_swedish_ci');
            
            
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_log');
    }
}
