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

Auth::routes(['verify' => true]);

Route::prefix('/admin')->namespace('Admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('admin.home');

    Route::get('/languages', 'LanguageController@index')->name('admin.languages');
    Route::get('/languages/add', 'LanguageController@add')->name('admin.languages.add');
    Route::post('/languages/store', 'LanguageController@store')->name('admin.languages.store');
});

Route::prefix('/')->namespace('API\Lang')->group(function () {
    Route::get('/translate/{id}', 'TranslateController@index')->name('api.translate');
    Route::get('/translate/edit', 'TranslateController@edit')->name('api.translate.edit');
});
