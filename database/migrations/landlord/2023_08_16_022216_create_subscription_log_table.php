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
        Schema::create('tbl_subscription_log', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('subscription_id');
            $table->bigInteger('user_id');
            $table->string('action');
            $table->longText('data')->nullable();
            $table->longText('feature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_subscription_log');
    }
};
