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
    Route::get('/languages/change-status/{id}', 'LanguageController@changeStatus')->name('admin.languages.change-status');

    Route::get('/users', 'UserController@index')->name('admin.users');
    Route::get('/users/add', 'UserController@add')->name('admin.users.add');
    Route::post('/users/store', 'UserController@store')->name('admin.users.store');
    Route::get('/users/edit/{id}', 'UserController@edit')->name('admin.users.edit');
    Route::post('/users/update', 'UserController@update')->name('admin.users.update');
    Route::get('/users/delete/{id}', 'UserController@delete')->name('admin.users.delete');
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

Route::prefix('/')->namespace('Translate')->group(function () {
    Route::get('/translate/{short_code}', 'TranslationController@index')->name('api.translate');
    Route::get('/edit/translate', 'TranslationController@editJsonFile')->name('api.translate.edit');
});

Route::prefix('/')->namespace('PublicArea')->group(function () {

    Route::get('/', 'HomeController@index')->name('public.home');

    Route::get('/verification/{short_code}', 'VerificationController@index')->name('verification.home');
    Route::get('/verification/form/{short_code}', 'VerificationController@formView')->name('verification.form');
    Route::post('/verification/form/submit/{short_code}', 'VerificationController@submitForm')->name('verification.form.submit');
    Route::get('/verification/preview/form/{short_code}', 'VerificationController@previewForm')->name('verification.form.preview');
    Route::get('/verification/download/form/{user_id}/{short_code}/{count}', 'VerificationController@downloadForm')->name('verification.form.download');

    Route::get('emails/reject/request/{user_id}/{language_id}', 'HomeController@rejectRequest')->name('translator-reject-request');
});
