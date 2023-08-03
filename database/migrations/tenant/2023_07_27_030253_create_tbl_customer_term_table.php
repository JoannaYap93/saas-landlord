<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCustomerTermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer_term', function (Blueprint $table) {
            $table->integer('customer_term_id')->primary();
            $table->string('customer_term_name', 100);
            $table->boolean('is_deleted')->default(0);
            $table->dateTime('customer_term_created');
            $table->dateTime('customer_term_updated');
            $table->integer('company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_customer_term');
    }
}
