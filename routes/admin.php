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

        Route::group(['prefix' => 'about_us'], function () {
	        Route::get('listing', 'Admin\AboutUsController@listing')->name('admin.about_us.listing');
	        Route::get('detail/{id?}', 'Admin\AboutUsController@detail')->name('admin.about_us.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\AboutUsController@arrangement')->name('admin.about_us.arrangement');
	        Route::post('save', 'Admin\AboutUsController@save')->name('admin.about_us.save');
	        Route::post('delete', 'Admin\AboutUsController@delete')->name('admin.about_us.delete');
	        Route::post('save_arrangement', 'Admin\AboutUsController@save_arrangement')->name('admin.about_us.save_arrangement');
            Route::post('bulk_action', 'Admin\AboutUsController@bulkAction')->name('admin.about_us.bulk_action');
	    });

        Route::group(['prefix' => 'about_us_page'], function () {
	        Route::get('listing', 'Admin\AboutUsPageController@listing')->name('admin.about_us_page.listing');
	        Route::get('detail/{id?}', 'Admin\AboutUsPageController@detail')->name('admin.about_us_page.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\AboutUsPageController@arrangement')->name('admin.about_us_page.arrangement');
	        Route::post('save', 'Admin\AboutUsPageController@save')->name('admin.about_us_page.save');
	        Route::post('delete', 'Admin\AboutUsPageController@delete')->name('admin.about_us_page.delete');
	        Route::post('save_arrangement', 'Admin\AboutUsPageController@save_arrangement')->name('admin.about_us_page.save_arrangement');
            Route::post('bulk_action', 'Admin\AboutUsPageController@bulkAction')->name('admin.about_us_page.bulk_action');
	    });

		Route::group(['prefix' => 'about_us_history'], function () {
	        Route::get('listing', 'Admin\AboutUsHistoryController@listing')->name('admin.about_us_history.listing');
	        Route::get('detail/{id?}', 'Admin\AboutUsHistoryController@detail')->name('admin.about_us_history.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\AboutUsHistoryController@arrangement')->name('admin.about_us_history.arrangement');
	        Route::post('save', 'Admin\AboutUsHistoryController@save')->name('admin.about_us_history.save');
	        Route::post('delete', 'Admin\AboutUsHistoryController@delete')->name('admin.about_us_history.delete');
	        Route::post('save_arrangement', 'Admin\AboutUsHistoryController@save_arrangement')->name('admin.about_us_history.save_arrangement');
            Route::post('bulk_action', 'Admin\AboutUsHistoryController@bulkAction')->name('admin.about_us_history.bulk_action');
	    });

		Route::group(['prefix' => 'about_us_mission'], function () {
	        Route::get('listing', 'Admin\AboutUsMissionController@listing')->name('admin.about_us_mission.listing');
	        Route::get('detail/{id?}', 'Admin\AboutUsMissionController@detail')->name('admin.about_us_mission.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\AboutUsMissionController@arrangement')->name('admin.about_us_mission.arrangement');
	        Route::post('save', 'Admin\AboutUsMissionController@save')->name('admin.about_us_mission.save');
	        Route::post('delete', 'Admin\AboutUsMissionController@delete')->name('admin.about_us_mission.delete');
	        Route::post('save_arrangement', 'Admin\AboutUsMissionController@save_arrangement')->name('admin.about_us_mission.save_arrangement');
            Route::post('bulk_action', 'Admin\AboutUsMissionController@bulkAction')->name('admin.about_us_mission.bulk_action');
	    });

		Route::group(['prefix' => 'about_us_business'], function () {
	        Route::get('listing', 'Admin\AboutUsBusinessController@listing')->name('admin.about_us_business.listing');
	        Route::get('detail/{id?}', 'Admin\AboutUsBusinessController@detail')->name('admin.about_us_business.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\AboutUsBusinessController@arrangement')->name('admin.about_us_business.arrangement');
	        Route::post('save', 'Admin\AboutUsBusinessController@save')->name('admin.about_us_business.save');
	        Route::post('delete', 'Admin\AboutUsBusinessController@delete')->name('admin.about_us_business.delete');
	        Route::post('save_arrangement', 'Admin\AboutUsBusinessController@save_arrangement')->name('admin.about_us_business.save_arrangement');
            Route::post('bulk_action', 'Admin\AboutUsBusinessController@bulkAction')->name('admin.about_us_business.bulk_action');
	    });

		Route::group(['prefix' => 'event'], function () {
	        Route::get('listing', 'Admin\EventController@listing')->name('admin.event.listing');
	        Route::get('detail/{id?}', 'Admin\EventController@detail')->name('admin.event.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\EventController@arrangement')->name('admin.event.arrangement');
	        Route::post('save', 'Admin\EventController@save')->name('admin.event.save');
	        Route::post('delete', 'Admin\EventController@delete')->name('admin.event.delete');
	        Route::post('save_arrangement', 'Admin\EventController@save_arrangement')->name('admin.event.save_arrangement');
            Route::post('bulk_action', 'Admin\EventController@bulkAction')->name('admin.event.bulk_action');
	    });

        Route::group(['prefix' => 'event_tag'], function () {
	        Route::get('listing', 'Admin\EventTagController@listing')->name('admin.event_tag.listing');
	        Route::get('detail/{id?}', 'Admin\EventTagController@detail')->name('admin.event_tag.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\EventTagController@arrangement')->name('admin.event_tag.arrangement');
	        Route::post('save', 'Admin\EventTagController@save')->name('admin.event_tag.save');
	        Route::post('delete', 'Admin\EventTagController@delete')->name('admin.event_tag.delete');
	        Route::post('save_arrangement', 'Admin\EventTagController@save_arrangement')->name('admin.event_tag.save_arrangement');
            Route::post('bulk_action', 'Admin\EventTagController@bulkAction')->name('admin.event_tag.bulk_action');
	    });

        Route::group(['prefix' => 'partners'], function () {
	        Route::get('listing', 'Admin\PartnersController@listing')->name('admin.partners.listing');
	        Route::get('detail/{id?}', 'Admin\PartnersController@detail')->name('admin.partners.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\PartnersController@arrangement')->name('admin.partners.arrangement');
	        Route::post('save', 'Admin\PartnersController@save')->name('admin.partners.save');
	        Route::post('delete', 'Admin\PartnersController@delete')->name('admin.partners.delete');
	        Route::post('save_arrangement', 'Admin\PartnersController@save_arrangement')->name('admin.partners.save_arrangement');
            Route::post('bulk_action', 'Admin\PartnersController@bulkAction')->name('admin.partners.bulk_action');
	    });

		Route::group(['prefix' => 'client'], function () {
	        Route::get('listing', 'Admin\ClientController@listing')->name('admin.client.listing');
	        Route::get('detail/{id?}', 'Admin\ClientController@detail')->name('admin.client.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\ClientController@arrangement')->name('admin.client.arrangement');
	        Route::post('save', 'Admin\ClientController@save')->name('admin.client.save');
	        Route::post('delete', 'Admin\ClientController@delete')->name('admin.client.delete');
	        Route::post('save_arrangement', 'Admin\ClientController@save_arrangement')->name('admin.client.save_arrangement');
            Route::post('bulk_action', 'Admin\ClientController@bulkAction')->name('admin.client.bulk_action');
	    });

		Route::group(['prefix' => 'contact_us'], function () {
	        Route::get('listing', 'Admin\ContactUsController@listing')->name('admin.contact_us.listing');
	        Route::get('detail/{id?}', 'Admin\ContactUsController@detail')->name('admin.contact_us.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\ContactUsController@arrangement')->name('admin.contact_us.arrangement');
	        Route::post('save', 'Admin\ContactUsController@save')->name('admin.contact_us.save');
	        Route::post('delete', 'Admin\ContactUsController@delete')->name('admin.contact_us.delete');
	        Route::post('save_arrangement', 'Admin\ContactUsController@save_arrangement')->name('admin.contact_us.save_arrangement');
            Route::post('bulk_action', 'Admin\ContactUsController@bulkAction')->name('admin.contact_us.bulk_action');
	    });

		Route::group(['prefix' => 'footer'], function () {
	        Route::get('listing', 'Admin\FooterController@listing')->name('admin.footer.listing');
	        Route::get('detail/{id?}', 'Admin\FooterController@detail')->name('admin.footer.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\FooterController@arrangement')->name('admin.footer.arrangement');
	        Route::post('save', 'Admin\FooterController@save')->name('admin.footer.save');
	        Route::post('delete', 'Admin\FooterController@delete')->name('admin.footer.delete');
	        Route::post('save_arrangement', 'Admin\FooterController@save_arrangement')->name('admin.footer.save_arrangement');
            Route::post('bulk_action', 'Admin\FooterController@bulkAction')->name('admin.footer.bulk_action');
	    });

		Route::group(['prefix' => 'collection'], function () {
	        Route::get('listing', 'Admin\CollectionController@listing')->name('admin.collection.listing');
	        Route::get('detail/{id?}', 'Admin\CollectionController@detail')->name('admin.collection.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\CollectionController@arrangement')->name('admin.collection.arrangement');
	        Route::post('save', 'Admin\CollectionController@save')->name('admin.collection.save');
	        Route::post('delete', 'Admin\CollectionController@delete')->name('admin.collection.delete');
	        Route::post('save_arrangement', 'Admin\CollectionController@save_arrangement')->name('admin.collection.save_arrangement');
            Route::post('bulk_action', 'Admin\CollectionController@bulkAction')->name('admin.collection.bulk_action');
	    });

		Route::group(['prefix' => 'business'], function () {
	        Route::get('listing', 'Admin\BusinessController@listing')->name('admin.business.listing');
	        Route::get('detail/{id?}', 'Admin\BusinessController@detail')->name('admin.business.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\BusinessController@arrangement')->name('admin.business.arrangement');
	        Route::post('save', 'Admin\BusinessController@save')->name('admin.business.save');
	        Route::post('delete', 'Admin\BusinessController@delete')->name('admin.business.delete');
	        Route::post('save_arrangement', 'Admin\BusinessController@save_arrangement')->name('admin.business.save_arrangement');
            Route::post('bulk_action', 'Admin\BusinessController@bulkAction')->name('admin.business.bulk_action');
	    });

		Route::group(['prefix' => 'supplier'], function () {
	        Route::get('listing', 'Admin\SupplierController@listing')->name('admin.supplier.listing');
	        Route::get('detail/{id?}', 'Admin\SupplierController@detail')->name('admin.supplier.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\SupplierController@arrangement')->name('admin.supplier.arrangement');
	        Route::post('save', 'Admin\SupplierController@save')->name('admin.supplier.save');
	        Route::post('delete', 'Admin\SupplierController@delete')->name('admin.supplier.delete');
	        Route::post('save_arrangement', 'Admin\SupplierController@save_arrangement')->name('admin.supplier.save_arrangement');
            Route::post('bulk_action', 'Admin\SupplierController@bulkAction')->name('admin.supplier.bulk_action');
	    });

		Route::group(['prefix' => 'series'], function () {
	        Route::get('listing', 'Admin\SeriesController@listing')->name('admin.series.listing');
	        Route::get('detail/{id?}', 'Admin\SeriesController@detail')->name('admin.series.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\SeriesController@arrangement')->name('admin.series.arrangement');
	        Route::post('save', 'Admin\SeriesController@save')->name('admin.series.save');
	        Route::post('delete', 'Admin\SeriesController@delete')->name('admin.series.delete');
	        Route::post('save_arrangement', 'Admin\SeriesController@save_arrangement')->name('admin.series.save_arrangement');
            Route::post('bulk_action', 'Admin\SeriesController@bulkAction')->name('admin.series.bulk_action');
	    });

		Route::group(['prefix' => 'product'], function () {
	        Route::get('listing', 'Admin\ProductController@listing')->name('admin.product.listing');
	        Route::get('detail/{id?}', 'Admin\ProductController@detail')->name('admin.product.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\ProductController@arrangement')->name('admin.product.arrangement');
	        Route::post('save', 'Admin\ProductController@save')->name('admin.product.save');
	        Route::post('delete', 'Admin\ProductController@delete')->name('admin.product.delete');
	        Route::post('save_arrangement', 'Admin\ProductController@save_arrangement')->name('admin.product.save_arrangement');
            Route::post('bulk_action', 'Admin\ProductController@bulkAction')->name('admin.product.bulk_action');
	    });

		Route::group(['prefix' => 'popup'], function () {
	        Route::get('listing', 'Admin\PopupController@listing')->name('admin.popup.listing');
	        Route::get('detail/{id?}', 'Admin\PopupController@detail')->name('admin.popup.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\PopupController@arrangement')->name('admin.popup.arrangement');
	        Route::post('save', 'Admin\PopupController@save')->name('admin.popup.save');
	        Route::post('delete', 'Admin\PopupController@delete')->name('admin.popup.delete');
	        Route::post('save_arrangement', 'Admin\PopupController@save_arrangement')->name('admin.popup.save_arrangement');
            Route::post('bulk_action', 'Admin\PopupController@bulkAction')->name('admin.popup.bulk_action');
	    });

        Route::group(['prefix' => 'event_page'], function () {
	        Route::get('listing', 'Admin\EventPageController@listing')->name('admin.event_page.listing');
	        Route::get('detail/{id?}', 'Admin\EventPageController@detail')->name('admin.event_page.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\EventPageController@arrangement')->name('admin.event_page.arrangement');
	        Route::post('save', 'Admin\EventPageController@save')->name('admin.event_page.save');
	        Route::post('delete', 'Admin\EventPageController@delete')->name('admin.event_page.delete');
	        Route::post('save_arrangement', 'Admin\EventPageController@save_arrangement')->name('admin.event_page.save_arrangement');
            Route::post('bulk_action', 'Admin\EventPageController@bulkAction')->name('admin.event_page.bulk_action');
	    });

		Route::group(['prefix' => 'pos_location_category'], function () {
	        Route::get('listing/{parent_id?}', 'Admin\PosLocationCategoryController@listing')->name('admin.pos_location_category.listing');
	        Route::get('detail/{id?}/parent_id/{parent_id?}', 'Admin\PosLocationCategoryController@detail')->name('admin.pos_location_category.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\PosLocationCategoryController@arrangement')->name('admin.pos_location_category.arrangement');
	        Route::post('save', 'Admin\PosLocationCategoryController@save')->name('admin.pos_location_category.save');
	        Route::post('delete', 'Admin\PosLocationCategoryController@delete')->name('admin.pos_location_category.delete');
	        Route::post('save_arrangement', 'Admin\PosLocationCategoryController@save_arrangement')->name('admin.pos_location_category.save_arrangement');
	        Route::post('bulk_action', 'Admin\PosLocationCategoryController@bulkAction')->name('admin.pos_location_category.bulk_action');
	    });

        Route::group(['prefix' => 'pos_location'], function () {
            Route::get('listing/{parent_id?}', 'Admin\PosLocationController@listing')->name('admin.pos_location.listing');
            Route::get('detail/{id?}/parent_id/{parent_id?}', 'Admin\PosLocationController@detail')->name('admin.pos_location.detail');
            Route::get('arrangement/{parent_id?}', 'Admin\PosLocationController@arrangement')->name('admin.pos_location.arrangement');
            Route::post('save', 'Admin\PosLocationController@save')->name('admin.pos_location.save');
            Route::post('delete', 'Admin\PosLocationController@delete')->name('admin.pos_location.delete');
            Route::post('save_arrangement', 'Admin\PosLocationController@save_arrangement')->name('admin.pos_location.save_arrangement');
            Route::post('bulk_action', 'Admin\PosLocationController@bulkAction')->name('admin.pos_location.bulk_action');
        });

		Route::group(['prefix' => 'online_shop'], function () {
	        Route::get('listing', 'Admin\OnlineShopController@listing')->name('admin.online_shop.listing');
	        Route::get('detail/{id?}', 'Admin\OnlineShopController@detail')->name('admin.online_shop.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\OnlineShopController@arrangement')->name('admin.online_shop.arrangement');
	        Route::post('save', 'Admin\OnlineShopController@save')->name('admin.online_shop.save');
	        Route::post('delete', 'Admin\OnlineShopController@delete')->name('admin.online_shop.delete');
	        Route::post('save_arrangement', 'Admin\OnlineShopController@save_arrangement')->name('admin.online_shop.save_arrangement');
            Route::post('bulk_action', 'Admin\OnlineShopController@bulkAction')->name('admin.online_shop.bulk_action');
	    });

		Route::group(['prefix' => 'retail_shop'], function () {
	        Route::get('listing', 'Admin\RetailShopController@listing')->name('admin.retail_shop.listing');
	        Route::get('detail/{id?}', 'Admin\RetailShopController@detail')->name('admin.retail_shop.detail');
	        Route::get('arrangement/{parent_id?}', 'Admin\RetailShopController@arrangement')->name('admin.retail_shop.arrangement');
	        Route::post('save', 'Admin\RetailShopController@save')->name('admin.retail_shop.save');
	        Route::post('delete', 'Admin\RetailShopController@delete')->name('admin.retail_shop.delete');
	        Route::post('save_arrangement', 'Admin\RetailShopController@save_arrangement')->name('admin.retail_shop.save_arrangement');
            Route::post('bulk_action', 'Admin\RetailShopController@bulkAction')->name('admin.retail_shop.bulk_action');
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




