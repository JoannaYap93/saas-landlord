<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCustomerCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer_category', function (Blueprint $table) {
            $table->increments('customer_category_id');
            $table->string('customer_category_name', 100);
            $table->string('customer_category_slug', 100);
            $table->dateTime('customer_category_created');
            $table->dateTime('customer_category_updated');
            $table->enum('customer_category_status', ['active', 'inactive'])->default('inactive');
            $table->boolean('is_deleted')->default(0);
            $table->tinyInteger('customer_category_priority')->nullable();
            $table->integer('company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_customer_category');
    }
}
