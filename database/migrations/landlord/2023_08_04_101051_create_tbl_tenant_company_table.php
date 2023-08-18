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
        Schema::create('tbl_tenant_company', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_name');
            $table->string('tenant_code');
            $table->string('referral_code')->nullable();
            $table->string('company_name');
            $table->string('company_email');
            $table->string('company_address');
            $table->string('company_reg_no');
            $table->string('company_phone_no');
            $table->integer('subscription_id');
            $table->string('company_cc_token')->nullable();
            $table->enum('subscription_first_time_status', ['paid', 'unpaid'])->default('unpaid');
            $table->enum('tenant_status', ['active', 'pending', 'suspended'])->default('active');
            $table->integer('created_by_user_id')->default(0);
            $table->longText('overwrite_feature')->nullable();
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
        Schema::dropIfExists('tbl_tenant_company');
    }
};
