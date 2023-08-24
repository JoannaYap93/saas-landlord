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
                'setting_type' => 'file',
                'setting_id' => 1,
                'setting_slug' => 'website_logo',
                'setting_value' => 'http://backend.huaxin.global/images/??logo-white.svg',
                'setting_description' => 'Website Logo',
                'is_editable' => 1,
            ),
            1 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 2,
                'setting_slug' => 'company_name',
                'setting_value' => 'FarmTech ',
                'setting_description' => 'Company Name',
                'is_editable' => 1,
            ),
            2 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 3,
                'setting_slug' => 'company_address',
                'setting_value' => 'No. 3-1, Jalan Merbah 1, Bandar Puchong Jaya, 47100 Puchong, Selangor',
                'setting_description' => 'Company Address',
                'is_editable' => 1,
            ),
            3 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 4,
                'setting_slug' => 'company_email',
                'setting_value' => 'email@email.com',
                'setting_description' => 'Company Email',
                'is_editable' => 1,
            ),
            4 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 5,
                'setting_slug' => 'company_reg_no',
                'setting_value' => '1310890-T',
                'setting_description' => 'Company Reg No',
                'is_editable' => 1,
            ),
            5 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 6,
                'setting_slug' => 'company_phone',
                'setting_value' => '+60183614531',
                'setting_description' => 'Company Phone',
                'is_editable' => 1,
            ),
            6 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 7,
                'setting_slug' => 'company_website',
                'setting_value' => 'www.farmtech.com',
                'setting_description' => 'Company Website',
                'is_editable' => 1,
            ),
            7 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 8,
                'setting_slug' => 'app_version',
                'setting_value' => '1.0.1',
                'setting_description' => 'App Version',
                'is_editable' => 0,
            ),
            8 => 
            array (
                'setting_type' => 'text',
                'setting_id' => 9,
                'setting_slug' => 'app_download_url',
                'setting_value' => 'https://drive.google.com/drive/u/0/folders/11lwZAwO8ZIPFZUBg3C4eAHect8Nvl5bL',
                'setting_description' => 'App Download URL',
                'is_editable' => 0,
            ),
            9 => 
            array (
                'setting_type' => 'file',
                'setting_id' => 10,
                'setting_slug' => 'website_favicon',
                'setting_value' => 'https://huaxin-stg.sgp1.digitaloceanspaces.com/media_library/setting/5/7580/huaxin_logo_transparent.png',
                'setting_description' => 'Website Favicon',
                'is_editable' => 1,
            ),
            10 => 
            array (
                'setting_type' => 'file',
                'setting_id' => 11,
                'setting_slug' => 'admin_site_logo',
                'setting_value' => 'https://huaxin-stg.sgp1.digitaloceanspaces.com/media_library/setting/4/7579/huaxin_logo.png',
                'setting_description' => 'Company Logo',
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
