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


Route::get('/', function () {
    return view('welcome');
});


Route::get('portfolios'          ,'PortfolioController@index');
Route::get('portfolios/create'   ,'PortfolioController@create');
Route::post('portfolios'          ,'PortfolioController@store');
Route::get('portfolios/{id}/edit','PortfolioController@edit');
Route::put('portfolios/{id}'     ,'PortfolioController@update');
Route::delete('portfolios/{id}'     ,'PortfolioController@destroy');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
