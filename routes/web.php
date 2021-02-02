<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController');

Route::group([
    'prefix' => 'dashboard',
    'middleware' => 'auth'
    ], function () {

        Route::patch('/links/set-item-schema', 'Admin\LinksController@setItemSchema');
        Route::post('/links/scrape', 'Admin\LinksController@scrape');

        Route::resource('/websites', 'Admin\WebsitesController');
        Route::resource('/links', 'Admin\LinksController');
        Route::resource('/item-schema', 'Admin\ItemSchemaController');
        Route::resource('/articles', 'Admin\ArticlesController');
});
