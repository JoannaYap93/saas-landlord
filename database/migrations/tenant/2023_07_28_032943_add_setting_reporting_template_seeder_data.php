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
        \DB::table('tbl_setting_reporting_template')->insert(array (
            0 => 
            array (
                'setting_reporting_template_id' => 1,
                'setting_reporting_template_name' => 'THIS YEAR ONLY',
            ),
            1 => 
            array (
                'setting_reporting_template_id' => 2,
                'setting_reporting_template_name' => 'THIS YEAR VS LAST YEAR',
            ),
            2 => 
            array (
                'setting_reporting_template_id' => 3,
                'setting_reporting_template_name' => 'COMPARE COMPANIES TO COMPANIES',
            ),
            3 => 
            array (
                'setting_reporting_template_id' => 4,
                'setting_reporting_template_name' => 'COMPARE MONTH TO MONTH',
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
