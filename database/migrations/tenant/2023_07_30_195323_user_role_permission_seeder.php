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
        \DB::table('tbl_user_permission')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin_listing',
                'guard_name' => 'web',
                'group_name' => 'ADMIN',
                'display_name' => 'Admin Listing',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin_manage',
                'guard_name' => 'web',
                'group_name' => 'ADMIN',
                'display_name' => 'Admin Manage',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'dashboard_sales_analysis',
                'guard_name' => 'web',
                'group_name' => 'DASHBOARD',
                'display_name' => 'Dashboard - Sales Analysis',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'admin_role_listing',
                'guard_name' => 'web',
                'group_name' => 'ADMIN ROLE',
                'display_name' => 'Admin Role Listing',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'admin_role_manage',
                'guard_name' => 'web',
                'group_name' => 'ADMIN ROLE',
                'display_name' => 'Admin Role Manage',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'admin_type_listing',
                'guard_name' => 'web',
                'group_name' => 'ADMIN TYPE',
                'display_name' => 'Admin Type Listing',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'admin_type_manage',
                'guard_name' => 'web',
                'group_name' => 'ADMIN TYPE',
                'display_name' => 'Admin Type Manage',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'company_listing',
                'guard_name' => 'web',
                'group_name' => 'COMPANY',
                'display_name' => 'Company Listing',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'company_manage',
                'guard_name' => 'web',
                'group_name' => 'COMPANY',
                'display_name' => 'Company Manage',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'company_land_listing',
                'guard_name' => 'web',
                'group_name' => 'COMPANY LAND',
                'display_name' => 'Company Land Listing',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'company_land_manage',
                'guard_name' => 'web',
                'group_name' => 'COMPANY LAND',
                'display_name' => 'Company Land Manage',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'company_land_category_listing',
                'guard_name' => 'web',
                'group_name' => 'COMPANY LAND CATEGORY',
                'display_name' => 'Company Land Category Listing',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'company_land_category_manage',
                'guard_name' => 'web',
                'group_name' => 'COMPANY LAND CATEGORY',
                'display_name' => 'Company Land Category Manage',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'customer_listing',
                'guard_name' => 'web',
                'group_name' => 'CUSTOMER',
                'display_name' => 'Customer Listing',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'customer_manage',
                'guard_name' => 'web',
                'group_name' => 'CUSTOMER',
                'display_name' => 'Customer Manage',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'customer_category_listing',
                'guard_name' => 'web',
                'group_name' => 'CUSTOMER CATEGORY',
                'display_name' => 'Customer Category Listing',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'customer_category_manage',
                'guard_name' => 'web',
                'group_name' => 'CUSTOMER CATEGORY',
                'display_name' => 'Customer Category Manage',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'customer_term_listing',
                'guard_name' => 'web',
                'group_name' => 'CUSTOMER TERM',
                'display_name' => 'Customer Term Listing',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'customer_term_manage',
                'guard_name' => 'web',
                'group_name' => 'CUSTOMER TERM',
                'display_name' => 'Customer Term Manage',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'delivery_order_listing',
                'guard_name' => 'web',
                'group_name' => 'DELIVERY ORDER',
                'display_name' => 'Delivery Order Listing',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'delivery_order_manage',
                'guard_name' => 'web',
                'group_name' => 'DELIVERY ORDER',
                'display_name' => 'Delivery Order Manage',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'invoice_listing',
                'guard_name' => 'web',
                'group_name' => 'INVOICE',
                'display_name' => 'Invoice Listing',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'invoice_manage',
                'guard_name' => 'web',
                'group_name' => 'INVOICE',
                'display_name' => 'Invoice Manage',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'product_listing',
                'guard_name' => 'web',
                'group_name' => 'PRODUCT',
                'display_name' => 'Product Listing',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'product_manage',
                'guard_name' => 'web',
                'group_name' => 'PRODUCT',
                'display_name' => 'Product Manage',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'product_category_listing',
                'guard_name' => 'web',
                'group_name' => 'PRODUCT CATEGORY',
                'display_name' => 'Product Category Listing',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'product_category_manage',
                'guard_name' => 'web',
                'group_name' => 'PRODUCT CATEGORY',
                'display_name' => 'Product Category Manage',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'product_tag_listing',
                'guard_name' => 'web',
                'group_name' => 'PRODUCT TAG',
                'display_name' => 'Product Tag Listing',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'product_tag_manage',
                'guard_name' => 'web',
                'group_name' => 'PRODUCT TAG',
                'display_name' => 'Product Tag Manage',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'product_stock_listing',
                'guard_name' => 'web',
                'group_name' => 'PRODUCT STOCK',
                'display_name' => 'Product Stock Listing',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'product_stock_manage',
                'guard_name' => 'web',
                'group_name' => 'PRODUCT STOCK',
                'display_name' => 'Product Stock Manage',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'master_setting',
                'guard_name' => 'web',
                'group_name' => 'MASTER',
                'display_name' => 'Master Setting',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'setting_product_size',
                'guard_name' => 'web',
                'group_name' => 'SETTING',
                'display_name' => 'Setting Product Size',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'setting_payment_method',
                'guard_name' => 'web',
                'group_name' => 'SETTING',
                'display_name' => 'Setting Payment Method',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'setting_warehouse',
                'guard_name' => 'web',
                'group_name' => 'SETTING',
                'display_name' => 'Setting Warehouse',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'sync_listing',
                'guard_name' => 'web',
                'group_name' => 'SYNC',
                'display_name' => 'Sync Listing',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'report_listing',
                'guard_name' => 'web',
                'group_name' => 'REPORTING',
                'display_name' => 'Reporting',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'setting_expense',
                'guard_name' => 'web',
                'group_name' => 'SETTING',
                'display_name' => 'Setting Expense',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'collect_listing',
                'guard_name' => 'web',
                'group_name' => 'COLLECT',
                'display_name' => 'Collect Listing',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'access_app',
                'guard_name' => 'web',
                'group_name' => 'ACCESS',
                'display_name' => 'Access App',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'access_backend',
                'guard_name' => 'web',
                'group_name' => 'ACCESS',
                'display_name' => 'Access Backend',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'setting_message_template',
                'guard_name' => 'web',
                'group_name' => 'SETTING',
                'display_name' => 'Setting Message Template',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'sync_zip_file',
                'guard_name' => 'web',
                'group_name' => 'SYNC',
                'display_name' => 'Sync Zip File',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'admin_delete',
                'guard_name' => 'web',
                'group_name' => 'ADMIN',
                'display_name' => 'Delete Admin Account',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'collect_manage',
                'guard_name' => 'web',
                'group_name' => 'COLLECT',
                'display_name' => 'Collect Manage',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'delivery_order_revert',
                'guard_name' => 'web',
                'group_name' => 'DELIVERY ORDER',
                'display_name' => 'Delivery Order Revert',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'payment_approval',
                'guard_name' => 'web',
                'group_name' => 'INVOICE',
                'display_name' => 'Payment Approval',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'delivery_order_company_land_edit',
                'guard_name' => 'web',
                'group_name' => 'DELIVERY ORDER',
                'display_name' => 'Delivery Order Company Land Edit',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'raw_material_listing',
                'guard_name' => 'web',
                'group_name' => 'RAW MATERIAL',
                'display_name' => 'Raw Material Listing',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'raw_material_manage',
                'guard_name' => 'web',
                'group_name' => 'RAW MATERIAL',
                'display_name' => 'Raw Material Manage',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'raw_material_category_listing',
                'guard_name' => 'web',
                'group_name' => 'RAW MATERIAL CATEGORY',
                'display_name' => 'Raw Material Category Listing',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'raw_material_category_manage',
                'guard_name' => 'web',
                'group_name' => 'RAW MATERIAL CATEGORY',
                'display_name' => 'Raw Material Category Manage',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'raw_material_company_usage_listing',
                'guard_name' => 'web',
                'group_name' => 'RAW MATERIAL COMPANY USAGE',
                'display_name' => 'Raw Material Company Usage Listing',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'raw_material_company_usage_manage',
                'guard_name' => 'web',
                'group_name' => 'RAW MATERIAL COMPANY USAGE',
                'display_name' => 'Raw Material Company Usage Manage',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'company_land_zone_listing',
                'guard_name' => 'web',
                'group_name' => 'COMPANY LAND ZONE',
                'display_name' => 'Company Land Zone Listing',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'company_land_zone_manage',
                'guard_name' => 'web',
                'group_name' => 'COMPANY LAND ZONE',
                'display_name' => 'Company Land Zone Manage',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'company_land_tree_listing',
                'guard_name' => 'web',
                'group_name' => 'COMPANY LAND TREE',
                'display_name' => 'Company Land Tree Listing',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'company_land_tree_manage',
                'guard_name' => 'web',
                'group_name' => 'COMPANY LAND TREE',
                'display_name' => 'Company Land Tree Manage',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'formula_listing',
                'guard_name' => 'web',
                'group_name' => 'FORMULA',
                'display_name' => 'Formula Listing',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'formula_manage',
                'guard_name' => 'web',
                'group_name' => 'FORMULA',
                'display_name' => 'Formula Manage',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'formula_category_listing',
                'guard_name' => 'web',
                'group_name' => 'FORMULA CATEGORY',
                'display_name' => 'Formula Category Listing',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'formula_category_manage',
                'guard_name' => 'web',
                'group_name' => 'FORMULA CATEGORY',
                'display_name' => 'Formula Category Manage',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'formula_usage_listing',
                'guard_name' => 'web',
                'group_name' => 'FORMULA USAGE',
                'display_name' => 'Formula Usage Listing',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'formula_usage_manage',
                'guard_name' => 'web',
                'group_name' => 'FORMULA USAGE',
                'display_name' => 'Formula Usage Manage',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'company_expense_listing',
                'guard_name' => 'web',
                'group_name' => 'COMPANY EXPENSE',
                'display_name' => 'Company Expense Listing',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'company_expense_manage',
                'guard_name' => 'web',
                'group_name' => 'COMPANY EXPENSE',
                'display_name' => 'Company Expense Manage',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'worker_listing',
                'guard_name' => 'web',
                'group_name' => 'WORKER',
                'display_name' => 'Worker Listing',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'worker_manage',
                'guard_name' => 'web',
                'group_name' => 'WORKER',
                'display_name' => 'Worker Manage',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'worker_type_listing',
                'guard_name' => 'web',
                'group_name' => 'WORKER TYPE',
                'display_name' => 'Worker Type Listing',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'worker_type_manage',
                'guard_name' => 'web',
                'group_name' => 'WORKER TYPE',
                'display_name' => 'Worker Type Manage',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'tree_log_listing',
                'guard_name' => 'web',
                'group_name' => 'TREE LOG',
                'display_name' => 'Tree Log Listing',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'tree_log_manage',
                'guard_name' => 'web',
                'group_name' => 'TREE LOG',
                'display_name' => 'Tree Log Manage',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'payment_url_listing',
                'guard_name' => 'web',
                'group_name' => 'PAYMENT URL',
                'display_name' => 'Payment Url Listing',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'payment_url_manage',
                'guard_name' => 'web',
                'group_name' => 'PAYMENT URL',
                'display_name' => 'Payment Url Manage',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'raw_material_company_listing',
                'guard_name' => 'web',
                'group_name' => 'RAW MATERIAL COMPANY',
                'display_name' => 'Raw Material Company Listing',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'raw_material_company_manage',
                'guard_name' => 'web',
                'group_name' => 'RAW MATERIAL COMPANY',
                'display_name' => 'Raw Material Company Manage',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'pnl_item_listing',
                'guard_name' => 'web',
                'group_name' => 'PnL ITEM',
                'display_name' => 'PnL Item Listing',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'pnl_item_manage',
                'guard_name' => 'web',
                'group_name' => 'PnL ITEM',
                'display_name' => 'PnL Item Manage',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'warehouse_listing',
                'guard_name' => 'web',
                'group_name' => 'WAREHOUSE',
                'display_name' => 'Warehouse Listing',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'warehouse_manage',
                'guard_name' => 'web',
                'group_name' => 'WAREHOUSE',
                'display_name' => 'Warehouse Manage',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'claim_listing',
                'guard_name' => 'web',
                'group_name' => 'CLAIM',
                'display_name' => 'Claim Listing',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'claim_manage',
                'guard_name' => 'web',
                'group_name' => 'CLAIM',
                'display_name' => 'Claim Manage',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'supplier_listing',
                'guard_name' => 'web',
                'group_name' => 'SUPPLIER',
                'display_name' => 'Supplier Listing',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'supplier_manage',
                'guard_name' => 'web',
                'group_name' => 'SUPPLIER',
                'display_name' => 'Supplier Manage',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'supplier_delivery_order_listing',
                'guard_name' => 'web',
                'group_name' => 'SUPPLIER DELIVERY ORDER',
                'display_name' => 'Supplier Delivery Order Listing',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'supplier_delivery_order_manage',
                'guard_name' => 'web',
                'group_name' => 'SUPPLIER DELIVERY ORDER',
                'display_name' => 'Supplier Delivery Order Manage',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'setting_currency_listing',
                'guard_name' => 'web',
                'group_name' => 'SETTING CURRENCY',
                'display_name' => 'Setting Currency Listing',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'setting_currency_manage',
                'guard_name' => 'web',
                'group_name' => 'SETTING CURRENCY',
                'display_name' => 'Setting Currency Manage',
            ),
            88 => 
            array (
                'id' => 92,
                'name' => 'setting_tree_age',
                'guard_name' => 'web',
                'group_name' => 'SETTING',
                'display_name' => 'Setting Tree Age',
            ),
            89 => 
            array (
                'id' => 93,
                'name' => 'payroll_listing',
                'guard_name' => 'web',
                'group_name' => 'PAYROLL',
                'display_name' => 'Payroll Listing',
            ),
            90 => 
            array (
                'id' => 94,
                'name' => 'payroll_manage',
                'guard_name' => 'web',
                'group_name' => 'PAYROLL',
                'display_name' => 'Payroll Manage',
            ),
            91 => 
            array (
                'id' => 95,
                'name' => 'payroll_item_listing',
                'guard_name' => 'web',
                'group_name' => 'PAYROLL',
                'display_name' => 'Payroll Item Listing',
            ),
            92 => 
            array (
                'id' => 96,
                'name' => 'payroll_item_manage',
                'guard_name' => 'web',
                'group_name' => 'PAYROLL',
                'display_name' => 'Payroll Item Manage',
            ),
            93 => 
            array (
                'id' => 97,
                'name' => 'supplier_delivery_order_delete',
                'guard_name' => 'web',
                'group_name' => 'SUPPLIER DELIVERY ORDER',
                'display_name' => 'Supplier Delivery Order Delete',
            ),
            94 => 
            array (
                'id' => 98,
                'name' => 'sync_company_expense_cost',
                'guard_name' => 'web',
                'group_name' => 'SYNC',
                'display_name' => 'Sync Company Expense Cost',
            ),
            95 => 
            array (
                'id' => 99,
                'name' => 'budget_estimate_manage',
                'guard_name' => 'web',
                'group_name' => 'BUDGET ESTIMATE',
                'display_name' => 'Budget Estimate Manage',
            ),
            96 => 
            array (
                'id' => 100,
                'name' => 'budget_estimate_listing',
                'guard_name' => 'web',
                'group_name' => 'BUDGET ESTIMATE',
                'display_name' => 'Budget Estimate Listing',
            ),
            97 => 
            array (
                'id' => 101,
                'name' => 'paid_invoice_edit',
                'guard_name' => 'web',
                'group_name' => 'INVOICE',
                'display_name' => 'Paid Invoice Edit',
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
