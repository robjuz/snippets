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

Route::get('/', 'SnippetController@create');

Route::get('snippet/create', 'SnippetController@create')->name('snippet.create');
Route::post('snippet', 'SnippetController@store')->name('snippet.store');

Route::get('csv-snippet/{snippet}', 'CsvSnippetController@show')->name('Csv-snippet.show');
