<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblClaimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_claim', function (Blueprint $table) {
            $table->integer('claim_id')->primary();
            $table->date('claim_start_date');
            $table->date('claim_end_date');
            $table->string('claim_remark', 155)->nullable();
            $table->string('claim_admin_remark', 155);
            $table->dateTime('claim_created');
            $table->dateTime('claim_updated');
            $table->integer('user_id');
            $table->tinyInteger('claim_status_id');
            $table->integer('approval_user_id')->default(0);
            $table->decimal('claim_amount', 12, 2);
            $table->integer('company_id');
            $table->boolean('is_account_check')->default(0);
            $table->boolean('is_payment')->default(0);
            $table->integer('admin_id')->default(0);
            $table->integer('worker_id')->nullable();
            $table->string('claim_number', 1000)->nullable();
            $table->integer('is_deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_claim');
    }
}
