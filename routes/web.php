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

Route::get('snippets', 'SnippetController@index')->name('snippet.index');
Route::get('snippet', 'SnippetController@create')->name('snippet.create');
Route::post('snippet', 'SnippetController@store')->name('snippet.store');


Route::get('csv-snippets', 'CsvSnippetController@index')->name('csv-snippet.index');
Route::get('csv-snippet/{snippet}', 'CsvSnippetController@show')->name('csv-snippet.show');

Route::get('text-snippets', 'TextSnippetController@index')->name('text-snippet.index');
Route::get('text-snippet/{snippet}', 'TextSnippetController@show')->name('text-snippet.show');

Route::get('image-snippets', 'ImageSnippetController@index')->name('image-snippet.index');
Route::get('image-snippet/{snippet}', 'ImageSnippetController@show')->name('image-snippet.show');

//Route::get('php-snippets', 'PhpSnippetController@index')->name('php-snippet.index');
//Route::get('php-snippet/{snippet}', 'PhpSnippetController@show')->name('php-snippet.show');