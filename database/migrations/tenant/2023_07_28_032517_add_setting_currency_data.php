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
        \DB::table('tbl_setting_currency')->insert(array (
            0 => 
            array (
                'setting_currency_id' => 1,
                'setting_currency_code' => 'MYR',
            'setting_currency_name' => 'Malaysian Ringgit (MYR)',
            ),
            1 => 
            array (
                'setting_currency_id' => 2,
                'setting_currency_code' => 'AUD',
            'setting_currency_name' => 'Australian Dollar (AUD)',
            ),
            2 => 
            array (
                'setting_currency_id' => 3,
                'setting_currency_code' => 'TWD',
            'setting_currency_name' => 'New Taiwan Dollar (TWD)',
            ),
            3 => 
            array (
                'setting_currency_id' => 4,
                'setting_currency_code' => 'SGD',
            'setting_currency_name' => 'Singapore Dollar (SGD)',
            ),
            4 => 
            array (
                'setting_currency_id' => 5,
                'setting_currency_code' => 'THB',
            'setting_currency_name' => 'Thailand Baht (THB)',
            ),
            5 => 
            array (
                'setting_currency_id' => 6,
                'setting_currency_code' => 'USD',
            'setting_currency_name' => 'US Dollar (USD)',
            ),
            6 => 
            array (
                'setting_currency_id' => 7,
                'setting_currency_code' => 'CNY',
            'setting_currency_name' => 'Yuan Renminbi (CNY)',
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
