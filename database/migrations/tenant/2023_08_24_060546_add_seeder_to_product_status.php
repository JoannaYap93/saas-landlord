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
        \DB::table('tbl_product_status')->insert(array (
            0 => 
            array (
                'product_status_name' => 'Draft'
            ),
            1 => 
            array (
                'product_status_name' => 'Publish'
            ),
            2 => 
            array (
                'product_status_name' => 'Pending'
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
