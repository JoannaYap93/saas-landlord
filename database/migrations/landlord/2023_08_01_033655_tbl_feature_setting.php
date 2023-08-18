<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_feature_setting', function (Blueprint $table) {
            $table->increments('feature_id');
            $table->string('feature_slug')->nullable();
            $table->string('feature_title')->nullable();
            $table->string('feature_group')->nullable();
            $table->string('feature_icon')->nullable();
            $table->decimal('feature_extra_charge', 11, 2)->nullable();
            $table->integer('feature_charge_per_kg')->default(0);
            $table->integer('feature_charge_per_year')->default(0);
            $table->integer('feature_charge_subscription_price')->default(0);
            $table->enum('feature_status', ['active', 'disable'])->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('tbl_feature_setting');
    }
};
