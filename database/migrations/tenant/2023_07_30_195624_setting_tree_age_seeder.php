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
        \DB::table('tbl_setting_tree_age')->insert(array (
            0 => 
            array (
                'setting_tree_age_id' => 1,
                'setting_tree_age' => 1,
                'setting_tree_age_lower_circumference' => 1.0,
                'setting_tree_age_upper_circumference' => 3.0,
                'setting_tree_age_created' => '2022-10-31 20:03:52',
                'setting_tree_age_updated' => '2022-10-31 20:03:52',
                'company_pnl_sub_item_code' => 'K1',
            ),
            1 => 
            array (
                'setting_tree_age_id' => 2,
                'setting_tree_age' => 2,
                'setting_tree_age_lower_circumference' => 3.0,
                'setting_tree_age_upper_circumference' => 6.0,
                'setting_tree_age_created' => '2022-10-31 20:04:10',
                'setting_tree_age_updated' => '2022-10-31 20:04:10',
                'company_pnl_sub_item_code' => 'K1',
            ),
            2 => 
            array (
                'setting_tree_age_id' => 3,
                'setting_tree_age' => 3,
                'setting_tree_age_lower_circumference' => 6.0,
                'setting_tree_age_upper_circumference' => 9.0,
                'setting_tree_age_created' => '2022-10-31 20:04:25',
                'setting_tree_age_updated' => '2022-10-31 20:04:25',
                'company_pnl_sub_item_code' => 'K1',
            ),
            3 => 
            array (
                'setting_tree_age_id' => 4,
                'setting_tree_age' => 4,
                'setting_tree_age_lower_circumference' => 9.0,
                'setting_tree_age_upper_circumference' => 12.0,
                'setting_tree_age_created' => '2022-10-31 20:04:48',
                'setting_tree_age_updated' => '2022-10-31 20:04:48',
                'company_pnl_sub_item_code' => 'K1',
            ),
            4 => 
            array (
                'setting_tree_age_id' => 5,
                'setting_tree_age' => 5,
                'setting_tree_age_lower_circumference' => 12.0,
                'setting_tree_age_upper_circumference' => 15.0,
                'setting_tree_age_created' => '2022-10-31 20:09:03',
                'setting_tree_age_updated' => '2022-10-31 20:09:03',
                'company_pnl_sub_item_code' => 'B10',
            ),
            5 => 
            array (
                'setting_tree_age_id' => 6,
                'setting_tree_age' => 6,
                'setting_tree_age_lower_circumference' => 15.0,
                'setting_tree_age_upper_circumference' => 18.0,
                'setting_tree_age_created' => '2022-10-31 20:09:06',
                'setting_tree_age_updated' => '2022-10-31 20:09:06',
                'company_pnl_sub_item_code' => 'B10',
            ),
            6 => 
            array (
                'setting_tree_age_id' => 7,
                'setting_tree_age' => 7,
                'setting_tree_age_lower_circumference' => 18.0,
                'setting_tree_age_upper_circumference' => 21.0,
                'setting_tree_age_created' => '2022-10-31 20:09:07',
                'setting_tree_age_updated' => '2022-10-31 20:09:07',
                'company_pnl_sub_item_code' => 'B10',
            ),
            7 => 
            array (
                'setting_tree_age_id' => 8,
                'setting_tree_age' => 8,
                'setting_tree_age_lower_circumference' => 21.0,
                'setting_tree_age_upper_circumference' => 24.0,
                'setting_tree_age_created' => '2022-10-31 20:09:08',
                'setting_tree_age_updated' => '2022-10-31 20:09:08',
                'company_pnl_sub_item_code' => 'B10',
            ),
            8 => 
            array (
                'setting_tree_age_id' => 9,
                'setting_tree_age' => 9,
                'setting_tree_age_lower_circumference' => 24.0,
                'setting_tree_age_upper_circumference' => 27.0,
                'setting_tree_age_created' => '2022-10-31 20:09:10',
                'setting_tree_age_updated' => '2022-10-31 20:09:10',
                'company_pnl_sub_item_code' => 'B10',
            ),
            9 => 
            array (
                'setting_tree_age_id' => 10,
                'setting_tree_age' => 10,
                'setting_tree_age_lower_circumference' => 27.0,
                'setting_tree_age_upper_circumference' => 30.0,
                'setting_tree_age_created' => '2022-10-31 20:09:11',
                'setting_tree_age_updated' => '2022-10-31 20:09:11',
                'company_pnl_sub_item_code' => 'B10',
            ),
            10 => 
            array (
                'setting_tree_age_id' => 11,
                'setting_tree_age' => 11,
                'setting_tree_age_lower_circumference' => 30.0,
                'setting_tree_age_upper_circumference' => 32.0,
                'setting_tree_age_created' => '2022-10-31 20:10:41',
                'setting_tree_age_updated' => '2022-10-31 20:10:41',
                'company_pnl_sub_item_code' => 'A10',
            ),
            11 => 
            array (
                'setting_tree_age_id' => 12,
                'setting_tree_age' => 12,
                'setting_tree_age_lower_circumference' => 32.0,
                'setting_tree_age_upper_circumference' => 34.0,
                'setting_tree_age_created' => '2022-10-31 20:10:44',
                'setting_tree_age_updated' => '2022-10-31 20:10:44',
                'company_pnl_sub_item_code' => 'A10',
            ),
            12 => 
            array (
                'setting_tree_age_id' => 13,
                'setting_tree_age' => 13,
                'setting_tree_age_lower_circumference' => 34.0,
                'setting_tree_age_upper_circumference' => 36.0,
                'setting_tree_age_created' => '2022-10-31 20:10:46',
                'setting_tree_age_updated' => '2022-10-31 20:10:46',
                'company_pnl_sub_item_code' => 'A10',
            ),
            13 => 
            array (
                'setting_tree_age_id' => 14,
                'setting_tree_age' => 14,
                'setting_tree_age_lower_circumference' => 36.0,
                'setting_tree_age_upper_circumference' => 38.0,
                'setting_tree_age_created' => '2022-10-31 20:10:47',
                'setting_tree_age_updated' => '2022-10-31 20:10:47',
                'company_pnl_sub_item_code' => 'A10',
            ),
            14 => 
            array (
                'setting_tree_age_id' => 15,
                'setting_tree_age' => 15,
                'setting_tree_age_lower_circumference' => 38.0,
                'setting_tree_age_upper_circumference' => 40.0,
                'setting_tree_age_created' => '2022-10-31 20:10:49',
                'setting_tree_age_updated' => '2022-10-31 20:10:49',
                'company_pnl_sub_item_code' => 'A10',
            ),
            15 => 
            array (
                'setting_tree_age_id' => 16,
                'setting_tree_age' => 16,
                'setting_tree_age_lower_circumference' => 40.0,
                'setting_tree_age_upper_circumference' => 42.0,
                'setting_tree_age_created' => '2022-10-31 20:10:50',
                'setting_tree_age_updated' => '2022-10-31 20:10:50',
                'company_pnl_sub_item_code' => 'A10',
            ),
            16 => 
            array (
                'setting_tree_age_id' => 17,
                'setting_tree_age' => 17,
                'setting_tree_age_lower_circumference' => 42.0,
                'setting_tree_age_upper_circumference' => 44.0,
                'setting_tree_age_created' => '2022-10-31 20:10:51',
                'setting_tree_age_updated' => '2022-10-31 20:10:51',
                'company_pnl_sub_item_code' => 'A10',
            ),
            17 => 
            array (
                'setting_tree_age_id' => 18,
                'setting_tree_age' => 18,
                'setting_tree_age_lower_circumference' => 44.0,
                'setting_tree_age_upper_circumference' => 46.0,
                'setting_tree_age_created' => '2022-10-31 20:10:53',
                'setting_tree_age_updated' => '2022-10-31 20:10:53',
                'company_pnl_sub_item_code' => 'A10',
            ),
            18 => 
            array (
                'setting_tree_age_id' => 19,
                'setting_tree_age' => 19,
                'setting_tree_age_lower_circumference' => 46.0,
                'setting_tree_age_upper_circumference' => 48.0,
                'setting_tree_age_created' => '2022-10-31 20:10:54',
                'setting_tree_age_updated' => '2022-10-31 20:10:54',
                'company_pnl_sub_item_code' => 'A10',
            ),
            19 => 
            array (
                'setting_tree_age_id' => 20,
                'setting_tree_age' => 20,
                'setting_tree_age_lower_circumference' => 48.0,
                'setting_tree_age_upper_circumference' => 50.0,
                'setting_tree_age_created' => '2022-10-31 20:10:55',
                'setting_tree_age_updated' => '2022-10-31 20:10:55',
                'company_pnl_sub_item_code' => 'A10',
            ),
            20 => 
            array (
                'setting_tree_age_id' => 21,
                'setting_tree_age' => 21,
                'setting_tree_age_lower_circumference' => 50.0,
                'setting_tree_age_upper_circumference' => 52.0,
                'setting_tree_age_created' => '2022-10-31 20:10:57',
                'setting_tree_age_updated' => '2022-10-31 20:10:57',
                'company_pnl_sub_item_code' => 'A10',
            ),
            21 => 
            array (
                'setting_tree_age_id' => 22,
                'setting_tree_age' => 22,
                'setting_tree_age_lower_circumference' => 52.0,
                'setting_tree_age_upper_circumference' => 54.0,
                'setting_tree_age_created' => '2022-10-31 20:10:58',
                'setting_tree_age_updated' => '2022-10-31 20:10:58',
                'company_pnl_sub_item_code' => 'A10',
            ),
            22 => 
            array (
                'setting_tree_age_id' => 23,
                'setting_tree_age' => 23,
                'setting_tree_age_lower_circumference' => 54.0,
                'setting_tree_age_upper_circumference' => 56.0,
                'setting_tree_age_created' => '2022-10-31 20:11:00',
                'setting_tree_age_updated' => '2022-10-31 20:11:00',
                'company_pnl_sub_item_code' => 'A10',
            ),
            23 => 
            array (
                'setting_tree_age_id' => 24,
                'setting_tree_age' => 24,
                'setting_tree_age_lower_circumference' => 56.0,
                'setting_tree_age_upper_circumference' => 58.0,
                'setting_tree_age_created' => '2022-10-31 20:11:04',
                'setting_tree_age_updated' => '2022-10-31 20:11:04',
                'company_pnl_sub_item_code' => 'A10',
            ),
            24 => 
            array (
                'setting_tree_age_id' => 25,
                'setting_tree_age' => 25,
                'setting_tree_age_lower_circumference' => 58.0,
                'setting_tree_age_upper_circumference' => 60.0,
                'setting_tree_age_created' => '2022-10-31 20:11:05',
                'setting_tree_age_updated' => '2022-10-31 20:11:05',
                'company_pnl_sub_item_code' => 'A10',
            ),
            25 => 
            array (
                'setting_tree_age_id' => 26,
                'setting_tree_age' => 26,
                'setting_tree_age_lower_circumference' => 60.0,
                'setting_tree_age_upper_circumference' => 61.0,
                'setting_tree_age_created' => '2022-10-31 20:12:59',
                'setting_tree_age_updated' => '2022-10-31 20:12:59',
                'company_pnl_sub_item_code' => 'A10',
            ),
            26 => 
            array (
                'setting_tree_age_id' => 27,
                'setting_tree_age' => 27,
                'setting_tree_age_lower_circumference' => 61.0,
                'setting_tree_age_upper_circumference' => 62.0,
                'setting_tree_age_created' => '2022-10-31 20:13:06',
                'setting_tree_age_updated' => '2022-10-31 20:13:06',
                'company_pnl_sub_item_code' => 'A10',
            ),
            27 => 
            array (
                'setting_tree_age_id' => 28,
                'setting_tree_age' => 28,
                'setting_tree_age_lower_circumference' => 62.0,
                'setting_tree_age_upper_circumference' => 63.0,
                'setting_tree_age_created' => '2022-10-31 20:13:07',
                'setting_tree_age_updated' => '2022-10-31 20:13:07',
                'company_pnl_sub_item_code' => 'A10',
            ),
            28 => 
            array (
                'setting_tree_age_id' => 29,
                'setting_tree_age' => 29,
                'setting_tree_age_lower_circumference' => 63.0,
                'setting_tree_age_upper_circumference' => 64.0,
                'setting_tree_age_created' => '2022-10-31 20:13:08',
                'setting_tree_age_updated' => '2022-10-31 20:13:08',
                'company_pnl_sub_item_code' => 'A10',
            ),
            29 => 
            array (
                'setting_tree_age_id' => 30,
                'setting_tree_age' => 30,
                'setting_tree_age_lower_circumference' => 64.0,
                'setting_tree_age_upper_circumference' => 65.0,
                'setting_tree_age_created' => '2022-10-31 20:13:10',
                'setting_tree_age_updated' => '2022-10-31 20:13:10',
                'company_pnl_sub_item_code' => 'A10',
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
