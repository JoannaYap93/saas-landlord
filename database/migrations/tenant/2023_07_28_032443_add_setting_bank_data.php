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
        \DB::table('tbl_setting_bank')->insert(array (
            0 => 
            array (
                'setting_bank_id' => 1,
                'setting_bank_name' => 'Affin Bank Berhad',
            ),
            1 => 
            array (
                'setting_bank_id' => 2,
                'setting_bank_name' => 'Alliance Bank Malaysia Berhad',
            ),
            2 => 
            array (
                'setting_bank_id' => 3,
            'setting_bank_name' => 'AmBank (M) Berhad',
            ),
            3 => 
            array (
                'setting_bank_id' => 4,
                'setting_bank_name' => 'CIMB Bank Berhad',
            ),
            4 => 
            array (
                'setting_bank_id' => 5,
                'setting_bank_name' => 'Citibank Berhad',
            ),
            5 => 
            array (
                'setting_bank_id' => 6,
                'setting_bank_name' => 'Hong Leong Bank Berhad',
            ),
            6 => 
            array (
                'setting_bank_id' => 7,
            'setting_bank_name' => 'OCBC Bank (Malaysia) Berhad',
            ),
            7 => 
            array (
                'setting_bank_id' => 8,
                'setting_bank_name' => 'Public Bank Berhad',
            ),
            8 => 
            array (
                'setting_bank_id' => 9,
                'setting_bank_name' => 'RHB Bank Berhad',
            ),
            9 => 
            array (
                'setting_bank_id' => 10,
                'setting_bank_name' => 'Standard Chartered Bank Malaysia Berhad',
            ),
            10 => 
            array (
                'setting_bank_id' => 11,
            'setting_bank_name' => 'United Overseas Bank (Malaysia) Bhd.',
            ),
            11 => 
            array (
                'setting_bank_id' => 12,
                'setting_bank_name' => 'Bank Rakyat Malaysia',
            ),
            12 => 
            array (
                'setting_bank_id' => 13,
                'setting_bank_name' => 'Bank Islam Malaysia',
            ),
            13 => 
            array (
                'setting_bank_id' => 14,
            'setting_bank_name' => 'Bank Simpanan Nasional(BSN)',
            ),
            14 => 
            array (
                'setting_bank_id' => 15,
                'setting_bank_name' => 'HSBC Bank Malaysia',
            ),
            15 => 
            array (
                'setting_bank_id' => 16,
                'setting_bank_name' => 'Maybank Berhad',
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
