<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblClaimApprovalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_claim_approval', function (Blueprint $table) {
            $table->integer('claim_approval_id')->primary();
            $table->integer('claim_approval_step_id');
            $table->dateTime('claim_approval_created');
            $table->integer('approval_user_id');
            $table->integer('claim_id');
            $table->string('claim_approval_remark', 100);
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
        Schema::dropIfExists('tbl_claim_approval');
    }
}
