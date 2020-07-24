<?php

Route::group(['namespace' => 'Auth'], function () {
    Route::middleware(['guest:api'])->group(function () {
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');

        Route::post('forgot-password-email', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('forgot-password-reset', 'ResetPasswordController@reset');
    });


    Route::middleware('auth:api')->group(function(){
        Route::post('details', 'AuthController@get_user_details_info');
        Route::post('update-user-profile', 'AuthController@updateProfile');
        Route::post('logout', 'AuthController@logout');
        //Route::get('user', 'AuthController@user');
        // Email Verification Routes...
        Route::post('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
        Route::post('email/resend', 'VerificationController@resend')->name('verification.resend');


    });

    Route::post('refresh', 'AuthController@refresh');
});

// General APIs
Route::middleware('auth:api')->group(function() {
    Route::get('get-category-user', 'UserController@getCategoryUser');
    Route::get('get-subcategory-user', 'UserController@getSubCategoryUser');

    // Organization Profile
    Route::post('create-organization-profile','UserController@createOrganizationProfile');
    Route::post('update-organization-profile','UserController@updateOrganizationProfile');

    // General Profile
    Route::post('create-general-profile','UserController@createGeneralProfile');
    Route::post('update-general-profile','UserController@updateGeneralProfile');

});
