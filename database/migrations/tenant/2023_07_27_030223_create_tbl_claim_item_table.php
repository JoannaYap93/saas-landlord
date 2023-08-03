<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblClaimItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_claim_item', function (Blueprint $table) {
            $table->integer('claim_item_id')->primary();
            $table->integer('claim_id');
            $table->date('claim_item_date');
            $table->string('claim_item_name', 100)->nullable();
            $table->dateTime('claim_item_created');
            $table->dateTime('claim_item_updated');
            $table->decimal('claim_item_value', 10, 2);
            $table->decimal('claim_item_amount', 10, 2);
            $table->decimal('claim_item_amount_claim', 10, 2);
            $table->boolean('is_deleted')->default(0);
            $table->boolean('is_rejected')->default(0);
            $table->integer('claim_item_rejected_by')->nullable();
            $table->dateTime('claim_item_rejected_date')->nullable();
            $table->string('claim_item_rejected_remark', 100)->nullable();
            $table->enum('claim_item_type', ['company_expense_item_id', 'raw_material_company_usage_id', 'manually_company_expense_item_category_id', 'manually_raw_material_company_usage_category_id'])->default('company_expense_item_id');
            $table->integer('claim_item_type_value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_claim_item');
    }
}
