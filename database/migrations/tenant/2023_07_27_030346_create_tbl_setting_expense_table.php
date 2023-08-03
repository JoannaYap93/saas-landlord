<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_expense', function (Blueprint $table) {
            $table->increments('setting_expense_id');
            $table->text('setting_expense_name')->nullable();
            $table->string('setting_expense_description', 250)->nullable();
            $table->decimal('setting_expense_value', 11, 2)->nullable();
            $table->integer('company_id')->default(0);
            $table->integer('setting_expense_type_id')->nullable();
            $table->integer('setting_expense_category_id')->default(1);
            $table->boolean('is_compulsory')->default(0);
            $table->boolean('is_subcon_allow')->default(0);
            $table->decimal('setting_expense_subcon', 11, 2)->nullable();
            $table->enum('setting_expense_status', ['active', 'inactive']);
            $table->integer('worker_role_id')->nullable();
            $table->boolean('is_excluded_payroll')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_expense');
    }
}
