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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('one_page');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('one_page', function () {
    return view('one_page');
})->name("one_page");

Route::get('gallery_of_competitions', function () {
    return view('gallery_of_competitions');
})->name("gallery_of_competitions");

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/register', function () {
    abort(404);
})->name('register');

Route::get('login/vk', 'Auth\LoginVKController@redirectToProvider');
Route::get('login/vk/callback', 'Auth\LoginVKController@handleProviderCallback');

Route::get('login/ok', 'Auth\LoginOKController@redirectToProvider');
Route::get('login/ok/callback', 'Auth\LoginOKController@handleProviderCallback');

//API

Route::get("/cabinet", function (Request $request) {
    return Auth::user();
});

Route::get("/work/{id}", function (Request $request, $id) {
    return App\Works::find($id);
});

