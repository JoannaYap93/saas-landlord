<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDeliveryOrderExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_delivery_order_expense', function (Blueprint $table) {
            $table->increments('delivery_order_expense_id');
            $table->decimal('delivery_order_expense_value', 11, 2);
            $table->decimal('delivery_order_expense_kg', 11, 2)->default(0.00);
            $table->integer('delivery_order_expense_day')->default(0);
            $table->decimal('delivery_order_expense_total', 11, 2);
            $table->integer('setting_expense_id');
            $table->integer('delivery_order_id');
            $table->dateTime('delivery_order_expense_created');
            $table->dateTime('delivery_order_expense_updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_delivery_order_expense');
    }
}
