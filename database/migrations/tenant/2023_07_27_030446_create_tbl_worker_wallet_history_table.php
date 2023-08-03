<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblWorkerWalletHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_worker_wallet_history', function (Blueprint $table) {
            $table->increments('worker_wallet_history_id');
            $table->unsignedInteger('worker_id');
            $table->decimal('worker_wallet_history_before', 11, 2)->nullable();
            $table->decimal('worker_wallet_history_after', 11, 2)->nullable();
            $table->decimal('worker_wallet_history_value', 11, 2)->nullable();
            $table->enum('worker_wallet_history_status', ['pending', 'success', 'failed'])->default('pending');
            $table->dateTime('worker_wallet_history_created')->nullable();
            $table->dateTime('worker_wallet_history_updated')->nullable();
            $table->enum('worker_wallet_history_action', ['add', 'deduct'])->default('deduct');
            $table->unsignedInteger('user_id');
            $table->enum('worker_wallet_history_type', ['company_expense_item_id', 'raw_material_company_usage_id'])->default('company_expense_item_id');
            $table->integer('worker_wallet_history_type_value')->nullable();
            $table->string('worker_wallet_history_remark', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_worker_wallet_history');
    }
}
