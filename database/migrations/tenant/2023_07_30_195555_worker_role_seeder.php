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
        //
        \DB::table('tbl_worker_role')->insert(array (
            0 => 
            array (
                'worker_role_id' => 1,
                'worker_role_name' => 'Worker',
            ),
            1 => 
            array (
                'worker_role_id' => 2,
                'worker_role_name' => 'Farm Manager',
            ),
            2 => 
            array (
                'worker_role_id' => 3,
                'worker_role_name' => 'Management',
            ),
            3 => 
            array (
                'worker_role_id' => 4,
                'worker_role_name' => 'Director',
            ),
            4 => 
            array (
                'worker_role_id' => 5,
                'worker_role_name' => 'All',
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
        //
    }
};
