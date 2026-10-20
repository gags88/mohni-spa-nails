<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomepageController@index')->name('home.show');
// Route::get('/', function () {
//     return view('index');
// });
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact.show');
Route::post('/contact', 'App\Http\Controllers\ContactController@store')
    ->middleware('throttle:5,1')
    ->name('contact.store');
Route::get('/pa', function () {
    dd(bcrypt('password'));
});
Route::group(['prefix' => '/services'], function () {
    Route::get("/body-treatments", function () {
        return view('pages.services.body-treatments');
    });
    Route::get("/dermaplaning", function () {
        return view('pages.services.dermaplaning');
    });
    Route::get("/facials", function () {
        return view('pages.services.facials');
    });
    Route::get("/hydra-facial", function () {
        return view('pages.services.hydra-facial');
    });
    Route::get("/laser-hair-removal", function () {
        return view('pages.services.laser-hair-removal');
    });
    Route::get("/manicure-pedicure", function () {
        return view('pages.services.manicure-pedicure');
    });
    Route::get("/makeup", function () {
        return view('pages.services.makeup');
    });
    Route::get("/massage", function () {
        return view('pages.services.massage');
    });
    Route::get("/microdermabrasion", function () {
        return view('pages.services.microdermabrasion');
    });
    Route::get("/micro-needling", function () {
        return view('pages.services.micro-needling');
    });
    Route::get("/nail-recovery", function () {
        return view('pages.services.nail-recovery');
    });
    Route::get("/threading", function () {
        return view('pages.services.threading');
    });
    Route::get("/tinting", function () {
        return view('pages.services.tinting');
    });
    Route::get("/waxing", function () {
        return view('pages.services.waxing');
    });
    Route::get("/sugaring", function () {
        return view('pages.services.sugaring');
    });
});
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => '/admin'], function()
{   
   
    Route::group(['middleware' => ['guest']], function() {
        
        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
    
     /**
     * Home Routes
     */
    Route::get('/', 'BannerController@index')->name('banner.index');
    Route::get('/create', 'BannerController@create')->name('banner.create');
    Route::post('/store', 'BannerController@store')->name('banner.store');
    Route::get('/show/{id}', 'BannerController@show')->name('banner.show');
    Route::delete('/image/{id}', 'BannerController@destroy')->name('banner.destroy');

});
