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
        \DB::table('tbl_user_model_has_permission')->insert(array (
            0 => 
            array (
                'permission_id' => 93,
                'model_type' => 'App\Model\User',
                'model_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 94,
                'model_type' => 'App\Model\User',
                'model_id' => 1,
            ),
            2 => 
            array (
                'permission_id' => 95,
                'model_type' => 'App\Model\User',
                'model_id' => 1,
            ),
            3 => 
            array (
                'permission_id' => 96,
                'model_type' => 'App\Model\User',
                'model_id' => 1,
            ),
            4 => 
            array (
                'permission_id' => 97,
                'model_type' => 'App\Model\User',
                'model_id' => 1,
            ),
            5 => 
            array (
                'permission_id' => 92,
                'model_type' => 'App\Model\User',
                'model_id' => 1,
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
