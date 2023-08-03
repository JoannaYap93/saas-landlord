<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyPnlSubItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_pnl_sub_item', function (Blueprint $table) {
            $table->increments('company_pnl_sub_item_id');
            $table->string('company_pnl_sub_item_name', 100)->nullable();
            $table->integer('company_pnl_item_id')->nullable();
            $table->string('company_pnl_sub_item_code', 100)->nullable()->unique('company_pnl_sub_item_code_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_pnl_sub_item');
    }
}
