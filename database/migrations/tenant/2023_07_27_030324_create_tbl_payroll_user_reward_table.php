<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPayrollUserRewardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payroll_user_reward', function (Blueprint $table) {
            $table->increments('payroll_user_reward_id');
            $table->integer('payroll_user_id')->nullable();
            $table->integer('payroll_id')->nullable();
            $table->integer('setting_reward_id')->nullable();
            $table->integer('setting_reward_tier')->nullable();
            $table->decimal('payroll_user_reward_amount', 11, 2)->nullable();
            $table->dateTime('payroll_user_reward_created')->nullable();
            $table->dateTime('payroll_user_reward_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payroll_user_reward');
    }
}
