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
        \DB::table('tbl_setting_product_size')->insert(array (
            0 => 
            array (
                'setting_product_size_id' => 1,
                'setting_product_size_name' => 'AA',
            ),
            1 => 
            array (
                'setting_product_size_id' => 2,
                'setting_product_size_name' => 'A',
            ),
            2 => 
            array (
                'setting_product_size_id' => 3,
                'setting_product_size_name' => 'AB',
            ),
            3 => 
            array (
                'setting_product_size_id' => 4,
                'setting_product_size_name' => 'B',
            ),
            4 => 
            array (
                'setting_product_size_id' => 5,
                'setting_product_size_name' => 'BB',
            ),
            5 => 
            array (
                'setting_product_size_id' => 6,
                'setting_product_size_name' => 'BC',
            ),
            6 => 
            array (
                'setting_product_size_id' => 7,
                'setting_product_size_name' => 'C',
            ),
            7 => 
            array (
                'setting_product_size_id' => 8,
                'setting_product_size_name' => 'D',
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
