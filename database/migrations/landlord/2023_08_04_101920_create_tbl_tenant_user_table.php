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
        Schema::create('tbl_tenant_user', function (Blueprint $table) {
            $table->increments('tenant_user_id');
            $table->string('user_email', 100);
            $table->string('password', 100);
            $table->string('user_fullname', 100);
            $table->string('user_profile_photo', 100)->nullable();
            $table->string('user_nric', 100)->nullable();
            $table->string('user_nationality', 100);
            $table->string('user_gender', 100);
            $table->string('user_address', 100)->nullable();
            $table->string('user_address2', 100)->nullable();
            $table->string('user_city', 45)->nullable();
            $table->string('user_state', 45)->nullable();
            $table->string('user_postcode', 45)->nullable();
            $table->date('user_dob')->nullable();
            $table->enum('user_status', ['active', 'pending', 'suspended']);
            $table->dateTime('user_logindate')->nullable();
            $table->dateTime('user_cdate');
            $table->dateTime('user_udate');
            $table->string('user_ip', 15)->nullable();
            $table->string('user_mobile', 45);
            $table->date('user_join_date');
            $table->string('user_remember_token')->nullable();
            $table->tinyInteger('user_admin_skin')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->integer('user_type_id');
            $table->enum('user_language', ['en', 'cn', 'bm'])->default('en');
            $table->string('user_unique_code', 15);
            $table->string('user_token', 100)->nullable();
            $table->decimal('user_wallet_amount', 11, 2)->nullable();
            $table->integer('tenant_id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_tenant_user');
    }
};
