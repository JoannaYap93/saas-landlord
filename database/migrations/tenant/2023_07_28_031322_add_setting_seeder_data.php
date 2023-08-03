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
        DB::table('tbl_setting')->insert(array (
            0 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 1,
                'setting_slug' => 'g_s_t',
                'setting_value' => '7',
                'setting_description' => 'Invoice GST',
                'is_editable' => 1,
            ),
            1 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 2,
                'setting_slug' => 'product_stock_transfer_description',
                'setting_value' => 'Transfer from Delivery Order',
                'setting_description' => 'Using in api sync delivery order',
                'is_editable' => 1,
            ),
            2 => 
            array (
                'setting_type' => 'file',
                'setting_id' => 3,
                'setting_slug' => 'website_logo',
                'setting_value' => 'http://backend.huaxin.global/images/??logo-white.svg',
                'setting_description' => 'Website Logo',
                'is_editable' => 1,
            ),
            3 => 
            array (
                'setting_type' => 'file',
                'setting_id' => 4,
                'setting_slug' => 'admin_site_logo',
                'setting_value' => 'https://huaxin-stg.sgp1.digitaloceanspaces.com/media_library/setting/4/7579/huaxin_logo.png',
                'setting_description' => 'Adminsite Logo',
                'is_editable' => 1,
            ),
            4 => 
            array (
                'setting_type' => 'file',
                'setting_id' => 5,
                'setting_slug' => 'website_favicon',
                'setting_value' => 'https://huaxin-stg.sgp1.digitaloceanspaces.com/media_library/setting/5/7580/huaxin_logo_transparent.png',
                'setting_description' => 'Website Favicon',
                'is_editable' => 1,
            ),
            5 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 6,
                'setting_slug' => 'company_name',
                'setting_value' => 'HUAXIN ',
                'setting_description' => 'Company Name',
                'is_editable' => 1,
            ),
            6 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 7,
                'setting_slug' => 'company_address',
                'setting_value' => 'No. 3-1, Jalan Merbah 1, Bandar Puchong Jaya, 47100 Puchong, Selangor',
                'setting_description' => 'Company Address',
                'is_editable' => 1,
            ),
            7 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 8,
                'setting_slug' => 'company_email',
                'setting_value' => 'email@email.com',
                'setting_description' => 'Company Email',
                'is_editable' => 1,
            ),
            8 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 9,
                'setting_slug' => 'company_reg_no',
                'setting_value' => '1310890-T',
                'setting_description' => 'Company Reg No',
                'is_editable' => 1,
            ),
            9 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 10,
                'setting_slug' => 'company_phone',
                'setting_value' => '+60183614531',
                'setting_description' => 'Company Phone',
                'is_editable' => 1,
            ),
            10 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 11,
                'setting_slug' => 'whatsapp_text',
                'setting_value' => '',
                'setting_description' => 'Whatsapp Text',
                'is_editable' => 1,
            ),
            11 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 12,
                'setting_slug' => 'whatsapp_mobile_no',
                'setting_value' => '60183614531',
                'setting_description' => 'Whatsapp Mobile No',
                'is_editable' => 0,
            ),
            12 => 
            array (
                'setting_type' => 'url',
                'setting_id' => 13,
                'setting_slug' => 'company_website',
                'setting_value' => 'www.doorandooran.com',
                'setting_description' => 'Company Website',
                'is_editable' => 1,
            ),
            13 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 14,
                'setting_slug' => 'access_app_permission_id',
                'setting_value' => '40',
                'setting_description' => 'Access App Permission ID',
                'is_editable' => 0,
            ),
            14 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 15,
                'setting_slug' => 'security_pin',
                'setting_value' => '510800',
                'setting_description' => 'Security Pin',
                'is_editable' => 1,
            ),
            15 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 16,
                'setting_slug' => 'reset_password_message',
                'setting_value' => 'Huaxin: Here\'s the link to reset your password [LINK]',
                'setting_description' => 'Reset Password Message',
                'is_editable' => 1,
            ),
            16 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 17,
                'setting_slug' => 'payment_url_expiry_period',
                'setting_value' => '14',
                'setting_description' => 'Payment Url Expiry Period',
                'is_editable' => 1,
            ),
            17 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 18,
                'setting_slug' => 'graft_tree_bear_period',
                'setting_value' => '3',
                'setting_description' => 'Graft Tree Bear Period',
                'is_editable' => 1,
            ),
            18 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 19,
                'setting_slug' => 'new_tree_fruit_increase_per_year',
                'setting_value' => '10',
                'setting_description' => 'New Tree Fruit Increase Per Year',
                'is_editable' => 1,
            ),
            19 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 20,
                'setting_slug' => 'max_number_of_fruit_per_year',
                'setting_value' => '120',
                'setting_description' => 'Max Number of Fruit Per Year',
                'is_editable' => 1,
            ),
            20 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 21,
                'setting_slug' => 'new_tree_bear_period',
                'setting_value' => '4',
                'setting_description' => 'New Tree Bear Period',
                'is_editable' => 1,
            ),
            21 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 22,
                'setting_slug' => 'number_of_tree_per_acre',
                'setting_value' => '40',
                'setting_description' => 'Number of Tree Per Acre',
                'is_editable' => 1,
            ),
            22 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 23,
                'setting_slug' => 'normal_tree_fruit_increase_per_year',
                'setting_value' => '15',
                'setting_description' => 'Normal Tree Fruit Increase Per Year',
                'is_editable' => 1,
            ),
            23 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 24,
                'setting_slug' => 'percentage_price_increase_per_year_kg',
                'setting_value' => '9',
                'setting_description' => 'Percentage Price Increase Per Year KG',
                'is_editable' => 1,
            ),
            24 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 25,
                'setting_slug' => 'bd_category_id',
                'setting_value' => '3',
                'setting_description' => 'BD Category ID',
                'is_editable' => 1,
            ),
            25 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 26,
                'setting_slug' => 'labor_category_id',
                'setting_value' => '2',
                'setting_description' => 'Labor Category ID',
                'is_editable' => 1,
            ),
            26 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 27,
                'setting_slug' => 'worker_time_slots',
                'setting_value' => '[{"label":"7 AM - 12 PM","value":"AM"},{"label":"2 PM - 5 PM","value":"PM"}]',
                'setting_description' => 'Worker Time Slots',
                'is_editable' => 1,
            ),
            27 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 28,
                'setting_slug' => 'default_budget_per_tree',
                'setting_value' => '410',
                'setting_description' => 'Default Budget Per Tree',
                'is_editable' => 1,
            ),
            28 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 29,
                'setting_slug' => 'app_version',
                'setting_value' => '1.0.1',
                'setting_description' => 'App Version',
                'is_editable' => 0,
            ),
            29 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 30,
                'setting_slug' => 'app_download_url',
                'setting_value' => 'https://drive.google.com/drive/u/0/folders/11lwZAwO8ZIPFZUBg3C4eAHect8Nvl5bL',
                'setting_description' => 'App Download URL',
                'is_editable' => 0,
            ),
            30 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 31,
                'setting_slug' => 'each_durian_weight',
                'setting_value' => '1.50',
                'setting_description' => 'Each Durian Weight',
                'is_editable' => 1,
            ),
            31 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 32,
                'setting_slug' => 'forecast_report_default_year',
                'setting_value' => '2022',
                'setting_description' => 'Forecast Report Default Year',
                'is_editable' => 1,
            ),
            32 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 33,
                'setting_slug' => 'effective_capacity',
                'setting_value' => '0.75',
                'setting_description' => 'Effective Capacity',
                'is_editable' => 1,
            ),
            33 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 34,
                'setting_slug' => 'forecast_report_year_count',
                'setting_value' => '10',
                'setting_description' => 'Forecast Report Year Count',
                'is_editable' => 1,
            ),
            34 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 35,
                'setting_slug' => 'forecast_report_pe_ratio_year',
                'setting_value' => '2025',
                'setting_description' => 'Forecast Report PE Ratio Year',
                'is_editable' => 1,
            ),
            35 => 
            array (
                'setting_type' => 'number',
                'setting_id' => 36,
                'setting_slug' => 'pe_ratio',
                'setting_value' => '6',
                'setting_description' => 'PE Ratio',
                'is_editable' => 1,
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
