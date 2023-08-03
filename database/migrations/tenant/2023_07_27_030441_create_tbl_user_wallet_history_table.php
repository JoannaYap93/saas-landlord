<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserWalletHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_wallet_history', function (Blueprint $table) {
            $table->increments('user_wallet_history_id');
            $table->integer('user_id')->nullable();
            $table->decimal('user_wallet_history_before', 11, 2)->nullable();
            $table->decimal('user_wallet_history_after', 11, 2)->nullable();
            $table->decimal('user_wallet_history_value', 11, 2)->nullable();
            $table->enum('user_wallet_history_status', ['pending', 'success', 'failed'])->default('pending');
            $table->dateTime('user_wallet_history_created')->nullable();
            $table->dateTime('user_wallet_history_updated')->nullable();
            $table->enum('user_wallet_history_action', ['add', 'deduct'])->default('deduct');
            $table->integer('user_id_action')->nullable();
            $table->enum('user_wallet_history_type', ['company_expense_item_id', 'raw_material_company_usage_id'])->default('company_expense_item_id');
            $table->integer('user_wallet_history_type_value')->nullable();
            $table->string('user_wallet_history_remark', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_wallet_history');
    }
}
