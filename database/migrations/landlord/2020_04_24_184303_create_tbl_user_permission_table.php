<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro Laravel Export (1.6.0)
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreateTblUserPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_permission', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('guard_name', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->nullableTimestamps();
            $table->string('group_name', 50)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('display_name', 50)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            
            
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_permission');
    }
}
