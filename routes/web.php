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
    Route::get('/languages/edit/{id}', 'LanguageController@edit')->name('admin.languages.edit');
    Route::post('/languages/update', 'LanguageController@update')->name('admin.languages.update');
    Route::get('/languages/delete/{id}', 'LanguageController@delete')->name('admin.languages.delete');
});

Route::prefix('/translator')->namespace('Translator')->group(function () {
    Route::get('/', 'DashboardController@index')->name('translator.home');
});

Route::prefix('/moderator')->namespace('Moderator')->group(function () {
    Route::get('/', 'DashboardController@index')->name('moderator.home');
});

Route::prefix('/general')->namespace('General')->group(function () {
    Route::get('/', 'DashboardController@index')->name('general.home');
});

Route::prefix('/')->namespace('API\Lang')->group(function () {
    Route::get('/translate/{id}', 'TranslateController@index')->name('api.translate');
    Route::get('/edit/translate', 'TranslateController@editJsonFile')->name('api.translate.edit');
});

Route::prefix('/')->namespace('PublicArea')->group(function () {

    Route::get('/', 'HomeController@index')->name('public.home');

    Route::get('emails/reject/request/{user_id}/{language_id}', 'HomeController@rejectRequest')->name('translator-reject-request');
});
