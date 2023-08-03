<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBudgetEstimatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_budget_estimated', function (Blueprint $table) {
            $table->increments('budget_estimated_id');
            $table->string('budget_estimated_title', 100)->nullable();
            $table->integer('budget_estimated_year')->nullable();
            $table->integer('company_id')->nullable();
            $table->decimal('budget_estimated_amount', 11, 2)->nullable();
            $table->dateTime('budget_estimated_created')->nullable();
            $table->dateTime('budget_estimated_updated')->nullable();
            $table->boolean('is_deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_budget_estimated');
    }
}
