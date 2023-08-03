<?php

Auth::routes(['register' => false]);

Route::get('/', 'UserController@dashboard')->name('dashboard');
Route::get('/index', 'UserController@dashboard')->name('dashboard');

/**** User Management ****/
// Profile
Route::match(['get', 'post'], 'user/profile', 'UserController@profile')->name('user_profile');
// Change password
Route::match(['get', 'post'], 'user/change_password', 'UserController@change_password')->name('user_change_password');
// Route::group(['middleware' => ['permission:user_listing']], function () {
    //User 
    Route::match(['get', 'post'], 'user/listing', 'UserController@listing')->name('user_listing');
// });
// Route::group(['middleware' => ['permission:user_manage']], function () {
    //User 
    Route::match(['get', 'post'], 'user/add', 'UserController@add')->name('user_add');
    Route::match(['get', 'post'], 'user/edit/{id}', 'UserController@edit')->name('user_edit');
    Route::post('status', 'UserController@status')->name('user_status');
    Route::match(['get', 'post'], 'user/assign_permission/{id}', 'UserController@assign_permission')->name('assign_permission');
// });
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
    // });
});

//Feature
Route::group(['prefix' => 'feature'], function () {
    // Route::group(['middleware' => ['permission:user_create']], function () {
        Route::post('listing/datatable', 'FeatureController@getFeature')->name('feature.datatable');
        Route::get('listing', 'FeatureController@index')->name('feature.index');
        Route::post('change-status', 'FeatureController@changeStatus')->name('feature.change-status');
    // });
});

//Subscription
Route::group(['prefix' => 'subscription'], function () {
    // Route::group(['middleware' => ['permission:user_create']], function () {
        Route::post('listing/datatable', 'SubscriptionController@getSubscription')->name('subscription.datatable');
        Route::get('listing', 'SubscriptionController@index')->name('subscription.index');
        Route::get('add', 'SubscriptionController@add')->name('subscription.add.view');
        Route::post('save', 'SubscriptionController@save')->name('subscription.save');
        Route::get('edit/{subscription_id}', 'SubscriptionController@edit')->name('subscription.edit.view');
        Route::post('store-edit', 'SubscriptionController@storeEdit')->name('subscription.edit.save');
    // });
});

// Route::group(['middleware' => ['permission:master_setting']], function () {
    //Master Setting 
    Route::get('referral-code', 'ReferralController@index')->name('referral.code');
    // Route::match(['get', 'post'], 'setting/listing', 'SettingController@listing')->name('setting_listing');
    // Route::match(['get', 'post'], 'setting/edit/{id}', 'SettingController@edit')->name('setting_edit');
// });

Route::get('{any}', 'HomeController@index');
