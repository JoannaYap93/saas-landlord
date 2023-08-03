<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBudgetEstimatedLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_budget_estimated_log', function (Blueprint $table) {
            $table->increments('budget_estimated_log_id');
            $table->integer('budget_estimated_id')->nullable();
            $table->dateTime('budget_estimate_log_created')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('budget_estimated_log_action', 100)->nullable();
            $table->string('budget_estimated_log_remark', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_budget_estimated_log');
    }
}
