<?php

use App\Model\Setting;

Route::get('/', function () {
  if(auth()->user()){
    return redirect()->route('dashboard');
  }else{
    return redirect('/login');
  }
});

Auth::routes(['register' => false]);

// Route::get('/dashbord', 'UserController@dashboard')->name('dashboard');
Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');

/**** User Management ****/
// Profile
Route::match(['get', 'post'], 'user/profile', 'UserController@profile')->name('user_profile');
// Change password
Route::match(['get', 'post'], 'user/change_password', 'UserController@change_password')->name('user_change_password');
// Route::group(['middleware' => ['permission:user_listing']], function () {
    //User 
    // });
    // Route::group(['middleware' => ['permission:user_manage']], function () {
        // });
        //User 
Route::group(['prefix' => 'user'], function () {
    Route::post('listing/datatable', 'UserController@getUser')->name('user.datatable');
    Route::get('listing', 'UserController@listing')->name('user_listing');
    Route::get('add', 'UserController@add')->name('user_add');
    Route::post('store', 'UserController@store_add')->name('user.store');
    Route::get('edit/{id}', 'UserController@edit')->name('user_edit');
    Route::post('edit-store', 'UserController@store_edit')->name('user.store.edit');
    Route::post('status', 'UserController@status')->name('user_status');
    Route::match(['get', 'post'], 'user/assign_permission/{id}', 'UserController@assign_permission')->name('assign_permission');
    Route::post('change-status', 'UserController@changeStatus')->name('user.change-status');
});
Route::match(['get', 'post'], 'user/ajax_get_user_details', 'UserController@ajax_get_user_details')->name('ajax_get_user_details');

// Route::group(['middleware' => ['permission:user_role_listing']], function () {
    //UserRole
    Route::match(['get', 'post'], 'user_role/listing', 'UserRoleController@listing')->name('user_role_listing');
// });
// Route::group(['middleware' => ['permission:user_role_manage']], function () {
    //UserRole
    Route::match(['get', 'post'], 'role/edit/{id}', 'UserRoleController@edit')->name('user_role_edit');
    Route::match(['get', 'post'], 'role/add', 'UserRoleController@add')->name('user_role_add');
// });

//Subdomain
Route::group(['prefix' => 'subdomain'], function () {
    // Route::group(['middleware' => ['permission:user_create']], function () {
        Route::post('listing/datatable', 'SubdomainController@getSubdomain')->name('subdomain.datatable');
        Route::get('listing', 'SubdomainController@listing')->name('subdomain_listing');
        Route::get('add', 'SubdomainController@add_view')->name('subdomain_add');
        Route::post('add-save', 'SubdomainController@add')->name('subdomain_save');
        Route::get('overwrite-data', 'SubdomainController@retreiveOverWriteData')->name('overwrite.data');
        Route::post('additional-feature', 'SubdomainController@saveAdditionalFeature')->name('additional.feature');
    // });
});

//Feature
Route::group(['prefix' => 'feature'], function () {
    // Route::group(['middleware' => ['permission:user_create']], function () {
        Route::post('listing/datatable', 'FeatureController@getFeature')->name('feature.datatable');
        Route::get('listing', 'FeatureController@index')->name('feature.index');
        Route::post('change-status', 'FeatureController@changeStatus')->name('feature.change-status');
        Route::get('feature-data', 'FeatureController@getFeatureData')->name('feature.data');
        Route::post('feature-update', 'FeatureController@updateFeatureData')->name('feature.update.data');
    // });
});

//Salesperson listing
Route::group(['prefix' => 'sales-person'], function () {
    Route::post('listing/datatable', 'SalesPersonController@getSalesPerson')->name('sales-person.datatable');
    Route::get('listing', 'SalesPersonController@index')->name('sales-person.index');
    Route::post('user-datatable', 'SalesPersonController@tenantUserDatatable')->name('tenant.user.datatable');
    Route::post('company-datatable', 'SalesPersonController@tenantCompanyDatatable')->name('tenant.company.datatable');
    Route::post('land-datatable', 'SalesPersonController@tenantLandDatatable')->name('tenant.land.datatable');
    Route::post('invoice-datatable', 'SalesPersonController@tenantInvoiceDatatable')->name('tenant.invoice.datatable');
    Route::get('add', 'SalesPersonController@add')->name('sales-person.add.view');
    Route::post('store-sales-person', 'SalesPersonController@store')->name('sales-person.store');
    Route::get('edit/{id}', 'SalesPersonController@edit')->name('sales-person.edit');
    Route::post('edit-store', 'SalesPersonController@store_edit')->name('sales-person.store.edit');
    Route::post('change-status', 'SalesPersonController@changeStatus')->name('sales-person.change-status');

});

//Subscription
Route::group(['prefix' => 'subscription'], function () {
        Route::get('send-mail', 'MailController@index');

    // Route::group(['middleware' => ['permission:user_create']], function () {
        Route::post('listing/datatable', 'SubscriptionController@getSubscription')->name('subscription.datatable');
        Route::get('listing', 'SubscriptionController@index')->name('subscription.index');
        Route::get('add', 'SubscriptionController@add')->name('subscription.add.view');
        Route::post('save', 'SubscriptionController@save')->name('subscription.save');
        Route::get('edit/{subscription_id}', 'SubscriptionController@edit')->name('subscription.edit.view');
        Route::post('store-edit', 'SubscriptionController@storeEdit')->name('subscription.edit.save');
        Route::post('change-status', 'SubscriptionController@changeStatus')->name('subscription.change-status');

        // Subscription Log
        Route::post('log/datatable', 'SubscriptionController@getSubscriptionLog')->name('subscription.log.datatable');
        Route::get('log', 'SubscriptionController@log')->name('subscription.log.view');
    // });
});

// Route::group(['middleware' => ['permission:master_setting']], function () {
    //Master Setting 
    Route::get('referral-code', 'ReferralController@index')->name('referral.code');
    Route::match(['get', 'post'], 'setting/listing', 'SettingController@listing')->name('setting_listing');
    Route::match(['get', 'post'], 'setting/edit/{id}', 'SettingController@edit')->name('setting_edit');
// });

Route::get('order-summary/{tenant_company_id}/{expired_time}', 'SubscriptionController@tenantViewOrder')->name('subscription.view.order');
Route::post('order-summary-payment', 'SubscriptionController@tenantPaySubscription')->name('subscription.pay.order');
Route::get('{any}', 'HomeController@index');

Route::get('preview-invoice/{encrypt_number}', 'SalesPersonController@previewInvoice')->name('preview.invoice');
Route::get('export-invoice/{encrypt_number}', 'SalesPersonController@exportInvoice')->name('export.invoice');