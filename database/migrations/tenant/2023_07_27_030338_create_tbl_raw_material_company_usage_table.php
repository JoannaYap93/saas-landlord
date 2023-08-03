<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRawMaterialCompanyUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_raw_material_company_usage', function (Blueprint $table) {
            $table->increments('raw_material_company_usage_id');
            $table->integer('raw_material_id')->nullable();
            $table->integer('raw_material_company_id')->nullable();
            $table->enum('raw_material_company_usage_type', ['stock in', 'usage', 'formula usage restock', 'return', 'delete'])->nullable();
            $table->integer('raw_material_company_usage_qty')->nullable();
            $table->decimal('raw_material_company_usage_price_per_qty', 11, 2)->nullable();
            $table->decimal('raw_material_company_usage_value_per_qty', 11, 2)->nullable();
            $table->decimal('raw_material_company_usage_total_price', 11, 2)->nullable();
            $table->decimal('raw_material_company_usage_total_value', 11, 2)->nullable();
            $table->dateTime('raw_material_company_usage_created')->nullable();
            $table->dateTime('raw_material_company_usage_updated')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('formula_usage_id')->nullable();
            $table->integer('formula_usage_item_id')->nullable();
            $table->decimal('unit_price_per_value', 11, 3)->nullable();
            $table->decimal('raw_material_company_usage_total_value_remaining', 11, 2)->nullable();
            $table->integer('user_wallet_history_id')->nullable();
            $table->boolean('is_claim')->default(0);
            $table->integer('claim_user_id')->nullable();
            $table->decimal('claim_remaining_amount', 11, 2)->nullable();
            $table->date('raw_material_company_usage_date')->nullable();
            $table->unsignedInteger('claim_worker_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_raw_material_company_usage');
    }
}
