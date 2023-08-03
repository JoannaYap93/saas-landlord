<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyLandTreeLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_land_tree_log', function (Blueprint $table) {
            $table->increments('company_land_tree_log_id');
            $table->integer('company_land_tree_id')->nullable();
            $table->integer('company_land_tree_action_id')->nullable();
            $table->string('company_land_tree_log_description', 100)->nullable();
            $table->date('company_land_tree_log_date')->nullable();
            $table->dateTime('company_land_tree_log_created')->nullable();
            $table->integer('user_id')->nullable();
            $table->decimal('company_land_tree_log_value', 11, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_land_tree_log');
    }
}
