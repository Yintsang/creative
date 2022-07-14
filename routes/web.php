<?php
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
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

Route::get('refresh-csrf', function() {
    return csrf_token();
})->name('refresh-csrf');

\App\Language::indexRoute();

Route::get('/', 'IndexController@index')->name('index');
Route::get('/about_us', 'AboutUsController@index')->name('about_us');
Route::get('/client', 'ClientController@index')->name('client');
Route::get('/partners', 'PartnersController@index')->name('partners');
Route::get('/contact_us', 'ContactUsController@index')->name('contact_us');
Route::get('/event/{cate?}', 'EventController@index')->name('event');
Route::get('/business/{slug}', 'BusinessController@index')->name('business');
Route::get('/product_filter', 'BusinessController@submit')->name('business.filter');
Route::get('/wheretobuy', 'WhereToBuyController@index')->name('wheretobuy');
Route::get('/wheretobuy_filter', 'WhereToBuyController@submit')->name('wheretobuy_filter');