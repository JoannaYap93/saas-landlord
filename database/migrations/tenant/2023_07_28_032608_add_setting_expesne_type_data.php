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
        \DB::table('tbl_setting_expense_type')->insert(array (
            0 => 
            array (
                'setting_expense_type_id' => 1,
                'setting_expense_type_name' => 'Lumpsum',
            ),
            1 => 
            array (
                'setting_expense_type_id' => 2,
                'setting_expense_type_name' => 'Per Kg',
            ),
            2 => 
            array (
                'setting_expense_type_id' => 3,
                'setting_expense_type_name' => 'Per Day',
            ),
            3 => 
            array (
                'setting_expense_type_id' => 4,
                'setting_expense_type_name' => 'Per Day Per Kg',
            ),
            4 => 
            array (
                'setting_expense_type_id' => 5,
                'setting_expense_type_name' => 'Per Month',
            ),
            5 => 
            array (
                'setting_expense_type_id' => 6,
                'setting_expense_type_name' => 'Per Hour',
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
