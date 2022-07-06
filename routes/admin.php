<?php
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();

Route::group(['prefix' => config('appcustom.admin_path')], function () {

    Route::get('/', function(){
        return redirect(route('admin.home.detail'));
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('user', 'Admin\UserController@index')->name('admin.user');
        Route::get('home', 'Admin\HomeController@index')->name('admin.home.detail');
        Route::get('example', 'Admin\ExampleController@index')->name('admin.example.index');

        Route::group(['prefix' => 'cms_demo'], function () {
            Route::get('listing', 'Admin\CmsDemoController@listing')->name('admin.cms_demo.listing');
            Route::get('detail/{id?}', 'Admin\CmsDemoController@detail')->name('admin.cms_demo.detail');
            Route::get('arrangement/{parent_id?}', 'Admin\CmsDemoController@arrangement')->name('admin.cms_demo.arrangement');
            Route::post('save', 'Admin\CmsDemoController@save')->name('admin.cms_demo.save');
            Route::post('delete', 'Admin\CmsDemoController@delete')->name('admin.cms_demo.delete');
            Route::post('save_arrangement', 'Admin\CmsDemoController@save_arrangement')->name('admin.cms_demo.save_arrangement');
            Route::post('bulk_action', 'Admin\CmsDemoController@bulkAction')->name('admin.cms_demo.bulk_action');
        });

        Route::group(['prefix' => 'cms_demo_tag'], function () {
            Route::get('listing', 'Admin\CmsDemoTagController@listing')->name('admin.cms_demo_tag.listing');
            Route::get('detail/{id?}', 'Admin\CmsDemoTagController@detail')->name('admin.cms_demo_tag.detail');
            Route::get('arrangement/{parent_id?}', 'Admin\CmsDemoTagController@arrangement')->name('admin.cms_demo_tag.arrangement');
            Route::post('save', 'Admin\CmsDemoTagController@save')->name('admin.cms_demo_tag.save');
            Route::post('delete', 'Admin\CmsDemoTagController@delete')->name('admin.cms_demo_tag.delete');
            Route::post('save_arrangement', 'Admin\CmsDemoTagController@save_arrangement')->name('admin.cms_demo_tag.save_arrangement');
            Route::post('bulk_action', 'Admin\CmsDemoTagController@bulkAction')->name('admin.cms_demo_tag.bulk_action');
        });

        Route::group(['prefix' => 'home_page'], function () {
            Route::get('listing', 'Admin\HomePageController@listing')->name('admin.home_page.listing');
            Route::get('detail/{id?}', 'Admin\HomePageController@detail')->name('admin.home_page.detail');
            Route::get('arrangement/{parent_id?}', 'Admin\HomePageController@arrangement')->name('admin.home_page.arrangement');
            Route::post('save', 'Admin\HomePageController@save')->name('admin.home_page.save');
            Route::post('delete', 'Admin\HomePageController@delete')->name('admin.home_page.delete');
            Route::post('save_arrangement', 'Admin\HomePageController@save_arrangement')->name('admin.home_page.save_arrangement');
            Route::post('bulk_action', 'Admin\HomePageController@bulkAction')->name('admin.home_page.bulk_action');
        });

        Route::group(['prefix' => 'home_banner'], function () {
            Route::get('listing', 'Admin\HomeBannerController@listing')->name('admin.home_banner.listing');
            Route::get('detail/{id?}', 'Admin\HomeBannerController@detail')->name('admin.home_banner.detail');
            Route::get('arrangement/{parent_id?}', 'Admin\HomeBannerController@arrangement')->name('admin.home_banner.arrangement');
            Route::post('save', 'Admin\HomeBannerController@save')->name('admin.home_banner.save');
            Route::post('delete', 'Admin\HomeBannerController@delete')->name('admin.home_banner.delete');
            Route::post('save_arrangement', 'Admin\HomeBannerController@save_arrangement')->name('admin.home_banner.save_arrangement');
            Route::post('bulk_action', 'Admin\HomeBannerController@bulkAction')->name('admin.home_banner.bulk_action');
        });

        Route::group(['prefix' => 'translation'], function () {
            Route::get('listing', 'Admin\TranslationController@listing')->name('admin.translation.listing');
            Route::get('detail/{id?}', 'Admin\TranslationController@detail')->name('admin.translation.detail');
            Route::get('arrangement/{parent_id?}', 'Admin\TranslationController@arrangement')->name('admin.translation.arrangement');
            Route::post('save', 'Admin\TranslationController@save')->name('admin.translation.save');
            Route::post('delete', 'Admin\TranslationController@delete')->name('admin.translation.delete');
            Route::post('save_arrangement', 'Admin\TranslationController@save_arrangement')->name('admin.translation.save_arrangement');
            Route::post('bulk_action', 'Admin\TranslationController@bulkAction')->name('admin.translation.bulk_action');
        });

        Route::group(['prefix' => 'media'], function () {
            Route::post('upload', 'Admin\MediaController@upload')->name('admin.media.upload');
            Route::get('medias_in_folder/{folder_id?}', 'Admin\MediaController@medias_in_folder')->name('admin.media.medias_in_folder');
            Route::post('create_folder', 'Admin\MediaController@create_folder')->name('admin.media.create_folder');
            Route::post('rename_folder', 'Admin\MediaController@rename_folder')->name('admin.media.rename_folder');
            Route::post('move_folder', 'Admin\MediaController@move_folder')->name('admin.media.move_folder');
            Route::post('delete_folder', 'Admin\MediaController@delete_folder')->name('admin.media.delete_folder');
            Route::post('move', 'Admin\MediaController@move')->name('admin.media.move');
            Route::post('edit', 'Admin\MediaController@edit')->name('admin.media.edit');
            Route::post('delete', 'Admin\MediaController@delete')->name('admin.media.delete');
            Route::get('search', 'Admin\MediaController@search')->name('admin.media.search');
        });

        Route::group(['prefix' => 'user'], function () {
            Route::get('listing', 'Admin\UserController@listing')->name('admin.user.listing');
            Route::get('detail/{id?}', 'Admin\UserController@detail')->name('admin.user.detail');
            Route::get('arrangement/{parent_id?}', 'Admin\UserController@arrangement')->name('admin.user.arrangement');
            Route::post('save', 'Admin\UserController@save')->name('admin.user.save');
            Route::post('delete', 'Admin\UserController@delete')->name('admin.user.delete');
            Route::post('save_arrangement', 'Admin\UserController@save_arrangement')->name('admin.user.save_arrangement');
            Route::post('bulk_action', 'Admin\UserController@bulkAction')->name('admin.user.bulk_action');
        });

        Route::group(['prefix' => 'role'], function () {
            Route::get('listing', 'Admin\RoleController@listing')->name('admin.role.listing');
            Route::get('detail/{id?}', 'Admin\RoleController@detail')->name('admin.role.detail');
            Route::get('arrangement/{parent_id?}', 'Admin\RoleController@arrangement')->name('admin.role.arrangement');
            Route::post('save', 'Admin\RoleController@save')->name('admin.role.save');
            Route::post('delete', 'Admin\RoleController@delete')->name('admin.role.delete');
            Route::post('save_arrangement', 'Admin\RoleController@save_arrangement')->name('admin.role.save_arrangement');
            Route::post('bulk_action', 'Admin\RoleController@bulkAction')->name('admin.role.bulk_action');
        });

        Route::group(['prefix' => 'system_setting'], function () {
            Route::get('listing', 'Admin\SystemSettingController@listing')->name('admin.system_setting.listing');
            Route::get('detail/{id?}', 'Admin\SystemSettingController@detail')->name('admin.system_setting.detail');
            Route::get('arrangement/{parent_id?}', 'Admin\SystemSettingController@arrangement')->name('admin.system_setting.arrangement');
            Route::post('save', 'Admin\SystemSettingController@save')->name('admin.system_setting.save');
            Route::post('delete', 'Admin\SystemSettingController@delete')->name('admin.system_setting.delete');
            Route::post('save_arrangement', 'Admin\SystemSettingController@save_arrangement')->name('admin.system_setting.save_arrangement');
            Route::post('bulk_action', 'Admin\SystemSettingController@bulkAction')->name('admin.system_setting.bulk_action');
        });

        Route::group(['prefix' => 'media_library'], function () {
            Route::get('/', 'Admin\MediaLibraryController@index')->name('admin.media_library.index');
        });

        Route::get('2fa','Auth\PasswordSecurityController@show2faForm')->name('2fa');
        Route::post('generate2faSecret','Auth\PasswordSecurityController@generate2faSecret')->name('generate2faSecret');
        Route::post('2fa','Auth\PasswordSecurityController@enable2fa')->name('enable2fa');
        Route::post('disable2fa','Auth\PasswordSecurityController@disable2fa')->name('disable2fa');

        Route::post('2faVerify', function () {
            return redirect(URL()->previous());
        })->name('2faVerify')->middleware('2fa');

    });



    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // // Registration Routes...
    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'Auth\RegisterController@register');

    // // Password Reset Routes...
    // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset');

});




