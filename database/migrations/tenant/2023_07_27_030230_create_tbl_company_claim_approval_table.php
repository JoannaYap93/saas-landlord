<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyClaimApprovalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_claim_approval', function (Blueprint $table) {
            $table->increments('company_claim_approval_id');
            $table->integer('user_id');
            $table->integer('claim_approval_step_id');
            $table->dateTime('company_claim_approval_cdate');
            $table->integer('company_id');
            $table->integer('claim_status_id_involved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_claim_approval');
    }
}
