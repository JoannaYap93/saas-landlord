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
        \DB::table('tbl_setting_race')->insert(array (
            0 => 
            array (
                'setting_race_id' => 1,
                'setting_race_name' => 'Chinese',
            ),
            1 => 
            array (
                'setting_race_id' => 2,
                'setting_race_name' => 'Bumiputera',
            ),
            2 => 
            array (
                'setting_race_id' => 3,
                'setting_race_name' => 'Myanmar',
            ),
            3 => 
            array (
                'setting_race_id' => 4,
                'setting_race_name' => 'Indonesian',
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
