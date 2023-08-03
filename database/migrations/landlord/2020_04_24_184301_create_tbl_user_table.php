<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro Laravel Export (1.6.0)
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreateTblUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_email', 100)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->string('password', 100)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->string('user_fullname', 100)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->string('user_profile_photo', 100)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->string('user_nric', 100)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->string('user_nationality', 100)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->string('user_gender', 100)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->string('user_address', 100)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->string('user_address2', 100)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->string('user_city', 45)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->string('user_state', 45)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->string('user_postcode', 45)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->date('user_dob')->nullable();
            $table->enum('user_status', ['active', 'pending', 'suspend'])->charset('latin1')->collation('latin1_swedish_ci')->default('active')->nullable();
            $table->dateTime('user_logindate')->nullable();
            $table->dateTime('user_cdate')->nullable();
            $table->dateTime('user_udate')->nullable();
            $table->string('user_ip', 15)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->integer('is_deleted')->default(0)->nullable();
            $table->string('user_mobile', 45)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->date('user_join_date')->nullable();
            $table->string('user_remember_token', 191)->charset('latin1')->collation('latin1_swedish_ci')->nullable();
            $table->tinyInteger('user_admin_skin')->default(0)->nullable();
            $table->tinyInteger('user_platform_id')->default(0)->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->integer('user_type_id')->nullable();
            $table->string('referral_code')->nullable();
            
            
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user');
    }
}
