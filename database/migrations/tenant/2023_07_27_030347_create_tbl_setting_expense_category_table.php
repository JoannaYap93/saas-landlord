<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingExpenseCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_setting_expense_category', function (Blueprint $table) {
            $table->increments('setting_expense_category_id');
            $table->text('setting_expense_category_name')->nullable();
            $table->decimal('setting_expense_category_budget', 11, 2)->nullable();
            $table->boolean('is_budget_limited')->default(0);
            $table->boolean('is_backend_only')->default(0);
            $table->string('setting_expense_category_group', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_setting_expense_category');
    }
}
