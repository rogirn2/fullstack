<?php
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Auth::routes();
    Route::get('home', 'HomeController@index')->name('home');
    Route::middleware('auth:admin')->group(function () {
        Route::get('another', 'AnotherController@index')->name('another');
    });
});