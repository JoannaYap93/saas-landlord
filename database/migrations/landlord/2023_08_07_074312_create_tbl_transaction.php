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
        Schema::create('tbl_subscription_transaction', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number');
            $table->integer('subscription_id');
            $table->integer('tenant_id');
            $table->double('subscription_price', 11, 2)->nullable();
            $table->double('subscription_price_per_kg', 11, 2)->nullable();
            $table->double('subscription_additional_price', 11, 2)->nullable();
            $table->double('subscription_grand_total_price', 11, 2)->nullable();
            $table->string('transaction_month')->nullable();
            $table->string('transaction_year')->nullable();
            $table->string('transaction_token')->nullable();
            $table->string('transaction_response')->nullable();
            $table->string('transaction_cc_token')->nullable();
            $table->enum('transaction_status', ['Pending', 'Processing', 'Cancelled', 'Paid'])->default('Pending');
            $table->enum('transaction_type', ['first_time', 'monthly'])->nullable();
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
        Schema::dropIfExists('tbl_subscription_transaction');
    }
};
