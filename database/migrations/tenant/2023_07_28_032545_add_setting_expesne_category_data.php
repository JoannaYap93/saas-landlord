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
        \DB::table('tbl_setting_expense_category')->insert(array (
            0 => 
            array (
                'setting_expense_category_id' => 1,
                'setting_expense_category_name' => '{"en":"Warehouse & Packaging","cn":"\\u4ed3\\u5e93\\u548c\\u5305\\u88c5"}',
                'setting_expense_category_budget' => NULL,
                'is_budget_limited' => 0,
                'is_backend_only' => 1,
                'setting_expense_category_group' => 'Cost',
            ),
            1 => 
            array (
                'setting_expense_category_id' => 2,
                'setting_expense_category_name' => '{"en":"Labour","cn":"\\u52b3\\u52a8"}',
                'setting_expense_category_budget' => NULL,
                'is_budget_limited' => 0,
                'is_backend_only' => 0,
                'setting_expense_category_group' => 'Expense',
            ),
            2 => 
            array (
                'setting_expense_category_id' => 3,
                'setting_expense_category_name' => '{"en":"Accomodation","cn":"\\u4f4f\\u5bbf"}',
                'setting_expense_category_budget' => '42.00',
                'is_budget_limited' => 1,
                'is_backend_only' => 0,
                'setting_expense_category_group' => 'Expense',
            ),
            3 => 
            array (
                'setting_expense_category_id' => 4,
                'setting_expense_category_name' => '{"en":"Car Related Expenses","cn":"\\u6c7d\\u8f66\\u76f8\\u5173\\u8d39\\u7528"}',
                'setting_expense_category_budget' => '33.00',
                'is_budget_limited' => 1,
                'is_backend_only' => 0,
                'setting_expense_category_group' => 'Expense',
            ),
            4 => 
            array (
                'setting_expense_category_id' => 5,
                'setting_expense_category_name' => '{"en":"Reusable Tools","cn":"\\u53ef\\u91cd\\u590d\\u4f7f\\u7528\\u7684\\u5de5\\u5177"}',
                'setting_expense_category_budget' => NULL,
                'is_budget_limited' => 0,
                'is_backend_only' => 0,
                'setting_expense_category_group' => 'Cost',
            ),
            5 => 
            array (
                'setting_expense_category_id' => 6,
                'setting_expense_category_name' => '{"en":"Non-Reusable Tools","cn":"\\u4e0d\\u53ef\\u91cd\\u590d\\u4f7f\\u7528\\u7684\\u5de5\\u5177"}',
                'setting_expense_category_budget' => NULL,
                'is_budget_limited' => 0,
                'is_backend_only' => 0,
                'setting_expense_category_group' => 'Expense',
            ),
            6 => 
            array (
                'setting_expense_category_id' => 7,
                'setting_expense_category_name' => '{"en":"Test","cn":"\\u7279\\u8272"}',
                'setting_expense_category_budget' => '123.00',
                'is_budget_limited' => 0,
                'is_backend_only' => 0,
                'setting_expense_category_group' => 'Cost',
            ),
            7 => 
            array (
                'setting_expense_category_id' => 8,
                'setting_expense_category_name' => '{"en":"Kwek test","cn":"kwek test"}',
                'setting_expense_category_budget' => '12.00',
                'is_budget_limited' => 1,
                'is_backend_only' => 1,
                'setting_expense_category_group' => 'Expense',
            ),
            8 => 
            array (
                'setting_expense_category_id' => 9,
                'setting_expense_category_name' => '{"en":"New Test","cn":"New Test"}',
                'setting_expense_category_budget' => NULL,
                'is_budget_limited' => 0,
                'is_backend_only' => 0,
                'setting_expense_category_group' => 'Cost',
            ),
            9 => 
            array (
                'setting_expense_category_id' => 10,
                'setting_expense_category_name' => '{"en":"Test New","cn":"Test New"}',
                'setting_expense_category_budget' => NULL,
                'is_budget_limited' => 0,
                'is_backend_only' => 0,
                'setting_expense_category_group' => 'Expense',
            ),
            10 => 
            array (
                'setting_expense_category_id' => 11,
            'setting_expense_category_name' => '{"en":"TEHE","cn":"TEHE LA (CN)"}',
                'setting_expense_category_budget' => '10.00',
                'is_budget_limited' => 1,
                'is_backend_only' => 1,
                'setting_expense_category_group' => 'Cost',
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
