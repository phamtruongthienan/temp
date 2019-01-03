<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Imgfly::routes();
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::get('', 'Web\HomeController@homepage_index')->name('home.index');

    Route::get('login', 'Web\HomeController@homepage_login')->name('home.login');

    Route::get('sign-up', 'Web\HomeController@homepage_signup')->name('home.signup');

    Route::get('reset-password', 'Web\HomeController@homepage_reset_password')->name('home.resetpassword');

    Route::get('login/{provider}', 'Web\HomeController@homepage_social_login')->name('home.social.login');

    Route::get('callback/{provider}', 'Web\HomeController@homepage_social_callback')->name('home.social.callback');

    Route::get('school/{slug}{id}', 'Web\HomeController@homepage_detail_school')->name('home.detail.school');

    Route::get('schools', 'Web\HomeController@homepage_school')->name('home.school');

    Route::get('map', 'Web\HomeController@homepage_map')->name('home.map');
    
    Route::get('/press/{slug}', 'Web\NewsController@home_press')->name('home.press');

    Route::get('/course/{slug}', 'Web\NewsController@course_detail')->name('home.course.detail');

    Route::get('/i/{slug}', 'Web\NewsController@home_category')->name('home.news');

    Route::get('/promotion', 'Web\HomeController@homepage_promotion')->name('home.promotion');

    Route::get('promo/{slug}', 'Web\HomeController@homepage_promo_detail')->name('home.promotion.detail');

    Route::get('logout', 'Web\HomeController@homepage_logout')->name('home.logout');

    Route::get('404', 'Web\HomeController@homepage_logout')->name('home.logout');
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('view/pdf/{filename}', 'Web\HomeController@homepage_view_pdf')->name('home.view.pdf');
    Route::get('account', 'Web\HomeController@homepage_account')->name('home.account');
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['auth.api', 'throttle:60,1']], function () {
    Route::post('school-review', 'Api\ApiController@api_post_review')->name('api.post.review');
    Route::post('school-rating', 'Api\ApiController@api_post_rating')->name('api.post.rating');
    Route::post('wishlist', 'Api\ApiController@api_post_wishlist')->name('api.post.wishlist');
    Route::post('account/update', 'Api\ApiController@api_post_account_update')->name('api.post.account.update');
    Route::post('account/update_child', 'Api\ApiController@api_post_child_update')->name('api.post.child.update');
    Route::post('account/add_child', 'Api\ApiController@api_post_child_add')->name('api.post.child.add');
    Route::post('account/change_password', 'Api\ApiController@api_post_change_password')->name('api.post.change.password');
    Route::post('account/delete_child', 'Api\ApiController@api_post_child_delete')->name('api.post.child.delete');
    Route::get('child', 'Api\ApiController@api_get_child_id')->name('api.get.child');
    
});

Route::get('genitive', 'Api\ApiController@genitive')->name('api.genitive');
Route::post('login', 'Web\HomeController@homepage_login_action')->name('home.login.action');
Route::post('sign-up', 'Web\HomeController@homepage_signup_action')->name('home.signup.action');
Route::post('reset-password', 'Web\HomeController@homepage_reset_password_action')->name('home.resetpassword.action');
Route::post('/sendcontact', 'Web\HomeController@send_contact')->name('send-contact');
Route::post('/booking', 'Web\HomeController@booking')->name('booking');

// ADMIN

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'admin_esearch', 'middleware' => ['auth:admin']], function () {
        Route::get('/', 'Web\AdminController@admin_home_index')->name('admin.index');
        Route::get('advertise', 'Web\AdminController@admin_advertise_index')->name('admin.advertise');
        Route::get('setting', 'Web\AdminController@admin_setting_index')->name('admin.setting');
        Route::get('email', 'Web\AdminController@admin_email_index')->name('admin.email');
        Route::get('group-email', 'Web\AdminController@admin_group_email_index')->name('admin.group.email');
        Route::get('client', 'Web\AdminController@admin_client_index')->name('admin.client');
        Route::get('employee', 'Web\AdminController@admin_employee_index')->name('admin.employee');
        Route::get('customer', 'Web\AdminController@admin_customer_index')->name('admin.customer');
        Route::get('visiter', 'Web\AdminController@admin_visiter_index')->name('admin.visiter');
        Route::get('school', 'Web\AdminController@admin_school_index')->name('admin.school');
        Route::get('level_school', 'Web\AdminController@admin_level_school_index')->name('admin.level_school');
        Route::get('type_school', 'Web\AdminController@admin_type_school_index')->name('admin.type_school');
        Route::get('room', 'Web\AdminController@admin_room_index')->name('admin.room');
        Route::get('language', 'Web\AdminController@admin_language_index')->name('admin.language');
        Route::get('event', 'Web\AdminController@admin_event_index')->name('admin.event');
        Route::get('attribute', 'Web\AdminController@admin_attribute_index')->name('admin.attribute');
        Route::get('search', 'Web\AdminController@admin_search_index')->name('admin.search');
        Route::get('place', 'Web\AdminController@admin_place_index')->name('admin.place');
        Route::get('role', 'Web\AdminController@admin_role_index')->name('admin.role');
        Route::get('news', 'Web\AdminController@admin_news_index')->name('admin.news');
        Route::get('localization', 'Web\AdminController@admin_localization_index')->name('admin.localization');
        Route::get('chart', 'Web\AdminController@admin_chart_index')->name('admin.chart');
        Route::get('menu', 'Web\AdminController@admin_menu_index')->name('admin.menu');
        Route::get('logout', 'Web\AdminController@admin_logout_index')->name('admin.logout');


        
        // AJAX
        Route::group(['prefix' => 'ajax'], function () {
            Route::get('advertise', 'Web\AdminController@admin_advertise_ajax')->name('admin.advertise.ajax');
            Route::post('advertise', 'Web\AdminController@admin_post_advertise_ajax')->name('admin.post.advertise.ajax');
						Route::get('client', 'Web\AdminController@admin_client_ajax')->name('admin.client.ajax');
						Route::post('client', 'Web\AdminController@admin_post_client_ajax')->name('admin.post.client.ajax');
        });
    });
    Route::group(['prefix' => 'admin_esearch'], function () {
        Route::get('login', 'Web\AdminController@admin_login_index')->name('admin.login');
        Route::post('login', 'Web\AdminController@admin_login_action')->name('admin.login.action');
    });
});
