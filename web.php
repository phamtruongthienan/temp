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

    Route::get('/', 'Web\HomeController@homepage_index')->name('home.index');

    Route::get('/login', 'Web\HomeController@homepage_login')->name('home.login');

    Route::get('/sign-up', 'Web\HomeController@homepage_signup')->name('home.signup');

    Route::get('/login/{provider}', 'Web\HomeController@homepage_social_login')->name('home.social.login');

    Route::get('/callback/{provider}', 'Web\HomeController@homepage_social_callback')->name('home.social.callback');

    Route::get('/school/{slug}{id}', 'Web\HomeController@homepage_detail_school')->name('home.detail.school');

    Route::get('/schools', 'Web\HomeController@homepage_school')->name('home.school');

    Route::get('/map', 'Web\HomeController@homepage_map')->name('home.map');
    
    Route::get('/press/{slug}', 'Web\NewsController@aboutus')->name('home.aboutus');

    Route::get('/promotion', 'Web\HomeController@homepage_promotion')->name('home.promotion');

    Route::get('/news', 'Web\NewsController@news_index')->name('home.news');

    Route::get('/news/{slug}', 'Web\NewsController@news_details')->name('home.new.details');

    Route::get('/promo/{slug}', 'Web\HomeController@homepage_promo_detail')->name('home.promotion.detail');

    Route::get('/logout', 'Web\HomeController@homepage_logout')->name('home.logout');

    Route::get('/404', 'Web\HomeController@homepage_logout')->name('home.logout');

    Route::get('/edituser', 'Web\HomeController@homepage_edit_user')->name('home.edituser');

    Route::get('/editchild', 'Web\HomeController@homepage_edit_child')->name('home.editchild');

    Route::get('/addchild', 'Web\HomeController@homepage_add_child')->name('home.addchild');
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('/view/pdf/{filename}', 'Web\HomeController@homepage_view_pdf')->name('home.view.pdf');
    Route::get('/account', 'Web\HomeController@homepage_account')->name('home.account');
    Route::get('/child', 'Api\ApiController@api_get_child_id')->name('api.get.child');
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['auth.api']], function () {
    Route::post('/school-review', 'Api\ApiController@api_post_review')->name('api.post.review');
    Route::post('/school-rating', 'Api\ApiController@api_post_rating')->name('api.post.rating');
    Route::post('/wishlist', 'Api\ApiController@api_post_wishlist')->name('api.post.wishlist');
});


Route::post('/login', 'Web\HomeController@homepage_login_action')->name('home.login.action');
Route::post('/sign-up', 'Web\HomeController@homepage_signup_action')->name('home.signup.action');

