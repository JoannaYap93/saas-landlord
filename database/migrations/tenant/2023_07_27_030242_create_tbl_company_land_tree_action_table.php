<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCompanyLandTreeActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_land_tree_action', function (Blueprint $table) {
            $table->increments('company_land_tree_action_id');
            $table->string('company_land_tree_action_name', 100)->nullable();
            $table->integer('company_id')->nullable();
            $table->dateTime('company_land_tree_action_created')->nullable();
            $table->dateTime('company_land_tree_action_updated')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('is_value_required')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_land_tree_action');
    }
}
