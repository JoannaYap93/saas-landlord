<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblClaimLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_claim_log', function (Blueprint $table) {
            $table->integer('claim_log_id')->primary();
            $table->string('claim_log_action', 45);
            $table->integer('from_claim_status_id');
            $table->integer('to_claim_status_id');
            $table->dateTime('claim_log_created');
            $table->string('claim_log_description', 100);
            $table->integer('claim_id');
            $table->integer('claim_log_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_claim_log');
    }
}
