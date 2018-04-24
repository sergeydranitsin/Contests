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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('one_page', function (){
    return view('one_page');
})->name("one_page");

Route::get('gallery_of_competitions', function (){
    return view('gallery_of_competitions');
})->name("gallery_of_competitions");