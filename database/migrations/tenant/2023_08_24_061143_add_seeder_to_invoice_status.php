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
        \DB::table('tbl_invoice_status')->insert(array (
            0 => 
            array (
                'invoice_status_name' => 'Pending Payment'
            ),
            1 => 
            array (
                'invoice_status_name' => 'Paid'
            ),
            2 => 
            array (
                'invoice_status_name' => 'Cancelled'
            ),
            3 => 
            array (
                'invoice_status_name' => 'Rejected'
            ),
            4 => 
            array (
                'invoice_status_name' => 'Pending Approval'
            ),
            5 => 
            array (
                'invoice_status_name' => 'Partially Paid'
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
        
    }
};
