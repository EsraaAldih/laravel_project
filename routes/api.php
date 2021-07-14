<?php

use Illuminate\Support\Facades\Route;

    Route::post('register', 'Student\AuthController@register');
    Route::post('login', 'Student\AuthController@login');
    Route::group(['middleware' => ['auth:api']], function() {
    Route::post('logout', 'Student\AuthController@logout');
    Route::put('student/update', 'Student\AuthController@update');
    Route::post('refresh', 'Student\AuthController@refresh');
    Route::post('me', 'Student\AuthController@me');
    Route::get('email/verify/{id}', 'Student\VerificationApiController@verify')->name('verificationapi.verify');
    Route::get('email/resend', 'Student\VerificationApiController@resend')->name('verificationapi.resend');
    Route::post('course/{id}/enroll', 'Student\CourseController@enroll');
    Route::post('course/{id}/comment', 'Student\CourseController@comment');
    Route::apiResource('courses', 'Student\CourseController');
    });


