<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblClaimStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_claim_status', function (Blueprint $table) {
            $table->increments('claim_status_id');
            $table->string('claim_status_name', 45);
            $table->string('claim_approval_step_id_next', 45);
            $table->boolean('is_editable')->default(0);
            $table->boolean('is_edit_claim')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_claim_status');
    }
}
