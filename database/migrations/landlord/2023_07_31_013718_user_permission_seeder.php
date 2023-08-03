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
        \DB::table('tbl_user_permission')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'user_manage',
                'guard_name' => 'web',
                'group_name' => 'USER',
                'display_name' => 'User Management',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user_listing',
                'guard_name' => 'web',
                'group_name' => 'USER',
                'display_name' => 'User Listing',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'user_role_manage',
                'guard_name' => 'web',
                'group_name' => 'USER ROLE',
                'display_name' => 'User Role Management',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'user_role_listing',
                'guard_name' => 'web',
                'group_name' => 'USER ROLE',
                'display_name' => 'User Role Listing',
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
