<?php

Route::get('/', 'IndexController@index');

/*
* To register a route that needs to be authentication, wrap it in a
* Route::group() with the auth middleware
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/tours/{sktour:slug}/', 'ToursController@show')->name('tours.show');

    // Updated and Save reports
    Route::put('/tours/{sktour}/report/save')->name('report.update');
    Route::post('/tours/{sktour}/report/store', 'ToursController@store')->name('report.store');
});
