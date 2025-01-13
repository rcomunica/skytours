<?php

# This is the admin path. Comment this out if you don't have an admin panel component.

Route::get('/', 'AdminController@index')->name('index');

// Index
Route::get('tours', 'ToursController@index');
// Create
Route::get('tours/create', 'ToursController@create')->name('tours.create');
// Create
Route::post('tours', 'ToursController@store')->name('tours.store');
// Show
Route::get('tours/{sktour}/edit', 'ToursController@show')->name('tours.show');
// Edit
Route::put('tours/{sktour}/save', 'ToursController@update')->name('tours.update');

// Create legs
Route::post('tours/{sktour}/legs', 'ToursController@legs');

// Update legs
Route::put('tours/{sktour}/legs', 'ToursController@legs');
