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
        \DB::table('tbl_user_role')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'guard_name' => 'web',
                'created_at' => '2022-02-22 08:13:51',
                'updated_at' => '2022-02-10 14:36:45',
                'company_id' => 0,
            ),
            1 => 
            array (
                'id' => 13,
                'name' => 'Farm Manager',
                'guard_name' => 'web',
                'created_at' => '2022-03-25 04:26:20',
                'updated_at' => '2022-03-25 12:24:57',
                'company_id' => 0,
            ),
            2 => 
            array (
                'id' => 14,
                'name' => 'Account',
                'guard_name' => 'web',
                'created_at' => '2022-03-25 12:29:02',
                'updated_at' => '2022-03-25 12:29:02',
                'company_id' => 0,
            ),
            3 => 
            array (
                'id' => 15,
                'name' => 'Read Only Administrator',
                'guard_name' => 'web',
                'created_at' => '2022-06-23 09:51:20',
                'updated_at' => '2022-06-23 09:51:20',
                'company_id' => 0,
            ),
            4 => 
            array (
                'id' => 16,
                'name' => 'HR Administrator',
                'guard_name' => 'web',
                'created_at' => '2022-06-23 09:52:03',
                'updated_at' => '2022-06-23 09:52:03',
                'company_id' => 0,
            ),
            5 => 
            array (
                'id' => 17,
                'name' => 'Super Administrator',
                'guard_name' => 'web',
                'created_at' => '2022-10-28 07:06:23',
                'updated_at' => '2022-10-28 15:06:22',
                'company_id' => 0,
            ),
            6 => 
            array (
                'id' => 18,
                'name' => 'YAHU',
                'guard_name' => 'web',
                'created_at' => '2023-07-21 02:35:06',
                'updated_at' => '2023-07-21 10:32:33',
                'company_id' => 2,
            ),
            7 => 
            array (
                'id' => 19,
                'name' => 'YAH',
                'guard_name' => 'web',
                'created_at' => '2023-07-21 02:50:30',
                'updated_at' => '2023-07-21 10:50:30',
                'company_id' => 1,
            ),
            8 => 
            array (
                'id' => 20,
                'name' => 'TAH LA',
                'guard_name' => 'web',
                'created_at' => '2023-07-21 10:51:07',
                'updated_at' => '2023-07-21 10:51:07',
                'company_id' => 0,
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
