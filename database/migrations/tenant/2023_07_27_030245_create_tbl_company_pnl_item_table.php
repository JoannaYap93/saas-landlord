<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyPnlItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_pnl_item', function (Blueprint $table) {
            $table->increments('company_pnl_item_id');
            $table->string('company_pnl_item_name', 100)->nullable();
            $table->string('company_pnl_item_code', 10)->nullable();
            $table->string('company_pnl_item_desc', 255)->nullable();
            $table->dateTime('company_pnl_item_created')->nullable();
            $table->enum('company_pnl_item_type', ['expense', 'product_category', 'tree_category'])->nullable();
            $table->json('company_pnl_item_json')->nullable();
            $table->integer('company_pnl_item_start_year')->default(0);
            $table->integer('company_pnl_item_yearly_increase_value')->nullable();
            $table->integer('company_pnl_item_max_value')->nullable();
            $table->integer('company_pnl_item_initial_value')->nullable();
            $table->decimal('company_pnl_item_value_per_kg', 11, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_pnl_item');
    }
}
