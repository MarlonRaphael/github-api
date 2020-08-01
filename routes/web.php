<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'GithubController@index')->name('home');

Route::group([
    'prefix' => 'github',
    'as' => 'github.'
], function () {

  Route::post('search', 'GithubController@search')->name('search');

  Route::group(['prefix' => 'tags', 'as' => 'tags.'], function () {

    Route::get('/add', 'GithubController@showAddTag')->name('show.add');
    Route::post('/add', 'GithubController@addTag')->name('add');

  });


});
