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
        \DB::table('tbl_worker_type')->insert(array (
            0 => 
            array (
                'worker_type_name' => 'Daily'
            ),
            1 => 
            array (
                'worker_type_name' => 'Subcon'
            ),
            2 => 
            array (
                'worker_type_name' => 'Monthly'
            )
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
