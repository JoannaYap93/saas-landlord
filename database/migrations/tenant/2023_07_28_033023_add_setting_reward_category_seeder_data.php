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
        \DB::table('tbl_setting_reward_category')->insert(array (
            0 => 
            array (
                'setting_reward_category_id' => 1,
                'setting_reward_category_name' => 'Worker Reward',
            ),
            1 => 
            array (
                'setting_reward_category_id' => 2,
                'setting_reward_category_name' => 'Farm Manager Reward',
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
