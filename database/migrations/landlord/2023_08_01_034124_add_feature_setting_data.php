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
        //
        \DB::table('tbl_feature_setting')->insert(array (
            0 => 
            array (
                'feature_slug' => 'collect_module',
                'feature_title' => 'Collect Module',
                'feature_group' => 'Sales Related',
                'feature_icon' => 'fa fa-cart-plus',
                'feature_extra_charge' => 0,
            ),
            1 => 
            array (
                'feature_slug' => 'delivery_order_module',
                'feature_title' => 'Delivery Order Module',
                'feature_group' => 'Sales Related',
                'feature_icon' => 'fa fa-truck',
                'feature_extra_charge' => 0,
            ),
            2 => 
            array (
                'feature_slug' => 'invoice_module',
                'feature_title' => 'Invoice Module',
                'feature_group' => 'Sales Related',
                'feature_icon' => 'bx bxs-file-doc',
                'feature_extra_charge' => 0,
            ),
            3 => 
            array (
                'feature_slug' => 'customer_module',
                'feature_title' => 'Customer Module',
                'feature_group' => 'Sales Related',
                'feature_icon' => 'fa fa-user-circle',
                'feature_extra_charge' => 0,
            ),
            4 => 
            array (
                'feature_slug' => 'product_module',
                'feature_title' => 'Product Module',
                'feature_group' => 'Sales Related',
                'feature_icon' => 'fa fa-cubes',
                'feature_extra_charge' => 0,
            ),
            5 => 
            array (
                'feature_slug' => 'expense_module',
                'feature_title' => 'Expense Module',
                'feature_group' => 'Expense Related',
                'feature_icon' => 'bx bx-money',
                'feature_extra_charge' => 0,
            ),
            6 => 
            array (
                'feature_slug' => 'raw_material_module',
                'feature_title' => 'Raw Material Module',
                'feature_group' => 'Expense Related',
                'feature_icon' => 'fa fa-tree',
                'feature_extra_charge' => 0,
            ),
            7 => 
            array (
                'feature_slug' => 'formula_usage_module',
                'feature_title' => 'Formula Usage Module',
                'feature_group' => 'Expense Related',
                'feature_icon' => 'bx bx-file-find',
                'feature_extra_charge' => 0,
            ),
            8 => 
            array (
                'feature_slug' => 'supplier_module',
                'feature_title' => 'Supplier Module',
                'feature_group' => 'Expense Related',
                'feature_icon' => 'bx bxs-business',
                'feature_extra_charge' => 0,
            ),
            9 => 
            array (
                'feature_slug' => 'hr_record',
                'feature_title' => 'HR Record',
                'feature_group' => 'Expense Related',
                'feature_icon' => 'fa fa-users',
                'feature_extra_charge' => 0,
            ),
            10 => 
            array (
                'feature_slug' => 'claim_module',
                'feature_title' => 'Claim Module',
                'feature_group' => 'Expense Related',
                'feature_icon' => 'fa fa-coins',
                'feature_extra_charge' => 0,
            ),
            11 => 
            array (
                'feature_slug' => 'zone_module',
                'feature_title' => 'Zone Module',
                'feature_group' => 'Expense Related, Cost Per Tree',
                'feature_icon' => 'bx bx-map-pin',
                'feature_extra_charge' => 0,
            ),
            12 => 
            array (
                'feature_slug' => 'land_module',
                'feature_title' => 'Land Module',
                'feature_group' => 'Expense Related, Cost Per Tree',
                'feature_icon' => 'bx bxs-landscape',
                'feature_extra_charge' => 0,
            ),
            13 => 
            array (
                'feature_slug' => 'report',
                'feature_title' => 'Report',
                'feature_group' => 'Report',
                'feature_icon' => 'bx bxs-report',
                'feature_extra_charge' => 0,
            ),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
