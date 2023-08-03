<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCustomerPicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer_pic', function (Blueprint $table) {
            $table->increments('customer_pic_id');
            $table->string('customer_pic_name', 100)->nullable();
            $table->string('customer_pic_ic', 12)->nullable();
            $table->string('customer_pic_mobile_no', 20)->nullable();
            $table->dateTime('customer_pic_created')->nullable();
            $table->dateTime('customer_pic_updated')->nullable();
            $table->integer('customer_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_customer_pic');
    }
}
