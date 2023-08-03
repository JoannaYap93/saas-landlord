<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingExpenseOverwriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_expense_overwrite', function (Blueprint $table) {
            $table->integer('setting_expense_overwrite_id')->primary();
            $table->integer('setting_expense_type_id')->nullable();
            $table->decimal('setting_expense_overwrite_value', 11, 2)->nullable();
            $table->integer('setting_expense_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('is_extra_commission')->default(0);
            $table->decimal('setting_expense_overwrite_commission', 11, 2)->nullable();
            $table->dateTime('setting_expense_overwrite_created')->nullable();
            $table->dateTime('setting_expense_overwrite_updated')->nullable();
            $table->boolean('is_subcon_allow')->default(0);
            $table->decimal('setting_expense_overwrite_subcon', 11, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_expense_overwrite');
    }
}
