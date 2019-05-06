<?php
Route::group([], function () {
    Auth::routes();
    Route::get('home', 'HomeController@index')->name('home');
    Route::middleware('auth:user')->group(function () {
        Route::get('another', 'AnotherController@index')->name('another');
    });
});
