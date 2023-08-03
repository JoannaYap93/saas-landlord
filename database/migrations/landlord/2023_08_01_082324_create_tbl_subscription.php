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
        Schema::create('tbl_subscription', function (Blueprint $table) {
            $table->increments('subscription_id');
            $table->string('subscription_name');
            $table->string('subscription_description');
            $table->decimal('subscription_maximum_charge_per_year', 11, 2)->nullable();
            $table->decimal('subscription_price', 11, 2)->nullable();
            $table->decimal('subscription_charge_per_kg', 11, 2)->nullable();
            $table->enum('subscription_status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('tbl_subscription');
    }
};
