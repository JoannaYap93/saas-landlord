<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblWorkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_worker', function (Blueprint $table) {
            $table->increments('worker_id');
            $table->integer('user_id')->nullable();
            $table->string('worker_name', 100)->nullable();
            $table->string('worker_mobile', 45)->nullable();
            $table->string('worker_ic', 12)->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('worker_type_id')->nullable();
            $table->integer('worker_status_id')->nullable();
            $table->boolean('is_attendance_reward')->default(0);
            $table->integer('setting_reward_id')->nullable();
            $table->dateTime('worker_created')->nullable();
            $table->dateTime('worker_updated')->nullable();
            $table->integer('setting_race_id')->nullable();
            $table->date('worker_start_date')->nullable();
            $table->date('worker_resigned_date')->nullable();
            $table->boolean('is_suspended')->default(0);
            $table->json('worker_default')->nullable();
            $table->integer('worker_role_id')->nullable();
            $table->decimal('worker_wallet_amount', 11, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_worker');
    }
}
