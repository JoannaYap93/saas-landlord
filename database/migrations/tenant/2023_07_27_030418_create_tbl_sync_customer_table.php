<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSyncCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sync_customer', function (Blueprint $table) {
            $table->increments('sync_customer_id');
            $table->dateTime('sync_customer_created')->nullable();
            $table->dateTime('sync_customer_updated')->nullable();
            $table->string('sync_customer_company_name', 250)->nullable();
            $table->string('sync_customer_name', 100)->nullable();
            $table->string('sync_customer_mobile', 45)->nullable();
            $table->string('sync_customer_email', 250)->nullable();
            $table->string('sync_customer_code', 100)->nullable();
            $table->string('sync_customer_address', 100)->nullable();
            $table->string('sync_customer_address2', 100)->nullable();
            $table->string('sync_customer_state', 100)->nullable();
            $table->string('sync_customer_city', 100)->nullable();
            $table->string('sync_customer_postcode', 45)->nullable();
            $table->string('sync_id', 45)->nullable();
            $table->integer('is_executed')->nullable();
            $table->integer('company_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sync_customer');
    }
}
