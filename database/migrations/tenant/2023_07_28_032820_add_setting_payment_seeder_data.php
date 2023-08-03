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
        \DB::table('tbl_setting_payment')->insert(array (
            0 => 
            array (
                'setting_payment_id' => 1,
                'setting_payment_name' => 'Transfer',
                'is_payment_gateway' => 1,
                'is_offline' => 0,
                'setting_payment_status' => 0,
                'setting_payment_slug' => 'transfer',
            ),
            1 => 
            array (
                'setting_payment_id' => 2,
                'setting_payment_name' => 'Stripe',
                'is_payment_gateway' => 1,
                'is_offline' => 1,
                'setting_payment_status' => 0,
                'setting_payment_slug' => 'stripe',
            ),
            2 => 
            array (
                'setting_payment_id' => 3,
                'setting_payment_name' => 'Cash',
                'is_payment_gateway' => 0,
                'is_offline' => 0,
                'setting_payment_status' => 1,
                'setting_payment_slug' => 'cash',
            ),
            3 => 
            array (
                'setting_payment_id' => 4,
                'setting_payment_name' => 'Cash',
                'is_payment_gateway' => 0,
                'is_offline' => 1,
                'setting_payment_status' => 0,
                'setting_payment_slug' => 'cash-1',
            ),
            4 => 
            array (
                'setting_payment_id' => 5,
                'setting_payment_name' => 'Credit',
                'is_payment_gateway' => 0,
                'is_offline' => 0,
                'setting_payment_status' => 0,
                'setting_payment_slug' => 'credit',
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
