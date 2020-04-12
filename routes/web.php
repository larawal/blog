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
});

Route::group(['namespace' => 'admin'], function() {
    Auth::routes();
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('categories', 'CategoriesController@index')->name('categories');
        Route::group(['prefix' => 'categories/ajax'], function() {
            Route::post('list', 'CategoriesController@list');
            Route::post('get-parents', 'CategoriesController@getParents');
            Route::post('add', 'CategoriesController@add');
            Route::post('detail', 'CategoriesController@detail');
            Route::post('save', 'CategoriesController@save');
            Route::post('save_tree', 'CategoriesController@saveTree');
            Route::post('remove', 'CategoriesController@remove');
        });
        Route::get('articles', 'ArticlesController@index')->name('articles');
        Route::get('articles/{slug}', 'ArticlesController@edit');
        Route::group(['prefix' => 'articles/ajax'], function() {
            Route::post('list', 'ArticlesController@list');
            /*Route::post('add', 'ArticleController@showAjax');
            Route::post('edit', 'ArticleController@showAjax');
            Route::post('save', 'ArticleController@saveAjax');
            Route::post('remove', 'ArticleController@removeAjax');*/
        });
    });
});
