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
        \DB::table('tbl_user')->insert(array (
            0 => 
            array (
                'user_email' => 'joanna@webby.com.my',
                'password' => '$2y$10$hJjkx26b7HZ4Refy6Ii/VOEP04vZnA6qp6fD1s.J0XmqgohDSVPRC',
                'user_fullname' => 'George',
                'user_nationality' => 'Malaysia',
                'user_gender' => 'female',
                'user_status' => 'active',
                'user_type_id' => 1
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
