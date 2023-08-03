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
        \DB::table('tbl_user_type')->insert(array (
            0 => 
            array (
                'user_type_id' => 1,
                'user_type_name' => 'Super Administrator',
                'user_type_cdate' => '2022-10-31 20:09:06',
                'user_type_udate' => '2022-10-31 20:09:06',
            ),
            1 => 
            array (
                'user_type_id' => 2,
                'user_type_name' => 'Administrator',
                'user_type_cdate' => '2022-10-31 20:09:06',
                'user_type_udate' => '2022-10-31 20:09:06',
            ),
            2 => 
            array (
                'user_type_id' => 3,
                'user_type_name' => 'Read Only Administrator',
                'user_type_cdate' => '2022-10-31 20:09:06',
                'user_type_udate' => '2022-10-31 20:09:06',
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
