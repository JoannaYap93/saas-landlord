<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblClaimItemLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_claim_item_log', function (Blueprint $table) {
            $table->integer('claim_item_log_id')->primary();
            $table->integer('claim_item_id');
            $table->dateTime('claim_item_log_created');
            $table->string('claim_item_log_action', 45);
            $table->string('claim_item_log_remark', 100);
            $table->integer('claim_item_log_admin_id');
            $table->integer('claim_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_claim_item_log');
    }
}
