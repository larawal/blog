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

Route::group(['namespace' => 'website'], function() {
    Route::get('/', 'FrontendController@home');
    Route::get('article/{slug}', 'FrontendController@getArticle');
});

Route::group(['namespace' => 'admin'], function() {
    Auth::routes();
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
        Route::get('dashboard', 'DashboardController@index');
        Route::get('articles', 'ArticleController@index');
        Route::group(['prefix' => 'articles/ajax'], function() {
            Route::post('all', 'ArticleController@allAjax');
            Route::post('add', 'ArticleController@showAjax');
            Route::post('edit', 'ArticleController@showAjax');
            Route::post('save', 'ArticleController@saveAjax');
            Route::post('remove', 'ArticleController@removeAjax');
        });
    });
});
