<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('tbl_worker_status')->insert(array (
            0 => 
            array (
                'worker_status_name' => '{"en":"Whole Day","cn":"æ•´å¤©"}'
            ),
            1 => 
            array (
                'worker_status_name' => '{"en":"Half Day","cn":"åŠå¤©"}'
            ),
            2 => 
            array (
                'worker_status_name' => '{"en":"Resigned","cn":"è¾žèŒ"}'
            ),
            3 => 
            array (
                'worker_status_name' => '{"en":"Rest","cn":"ä¼‘æ¯"}'
            ),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
