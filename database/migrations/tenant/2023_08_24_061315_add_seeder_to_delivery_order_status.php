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
        \DB::table('tbl_delivery_order_status')->insert(array (
            0 => 
            array (
                'delivery_order_status_name' => 'Pending'
            ),
            1 => 
            array (
                'delivery_order_status_name' => 'Approved'
            ),
            2 => 
            array (
                'delivery_order_status_name' => 'Deleted'
            ),
            3 => 
            array (
                'delivery_order_status_name' => 'Pending Verification'
            ),
            4 => 
            array (
                'delivery_order_status_name' => 'Verified Approval'
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
