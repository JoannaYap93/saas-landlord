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
        \DB::table('tbl_claim_approval_step')->insert(array (
            0 => 
            array (
                'claim_approval_step_name' => 'Check'
            ),
            1 => 
            array (
                'claim_approval_step_name' => 'Verify'
            ),
            2 => 
            array (
                'claim_approval_step_name' => 'Approve'
            ),
            3 => 
            array (
                'claim_approval_step_name' => 'Account Check'
            ),
            4 => 
            array (
                'claim_approval_step_name' => 'Payment'
            ),
            5 => 
            array (
                'claim_approval_step_name' => 'Completed'
            ),
            6 => 
            array (
                'claim_approval_step_name' => 'Rejected (Resubmit)'
            ),
            7 => 
            array (
                'claim_approval_step_name' => 'Rejected (Permanent)'
            ),
            8 => 
            array (
                'claim_approval_step_name' => 'Cancelled'
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
