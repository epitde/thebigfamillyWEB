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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'Admin\DashboardController@index')->name('dashboard');

Route::get('/admin', 'AdminController@index');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
});

Route::resource('translate', 'API\Lang\TranslateController');
Route::get('/de/translate', 'API\Lang\TranslateController@germanIndex')->name('translate-de');
Route::get('/ca/translate', 'API\Lang\TranslateController@catalanIndex')->name('translate-ca');
Route::get('/change/data/en', 'API\Lang\TranslateController@changeDataEn')->name('change-data-en');
Route::get('/change/data/de', 'API\Lang\TranslateController@changeDataDe')->name('change-data-de');
Route::get('/change/data/ca', 'API\Lang\TranslateController@changeDataCa')->name('change-data-ca');
