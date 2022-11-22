<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Auth::routes();

Route::get('/', function(){
    return view("guests.home");
})->name('index');

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('index');
        Route::resource('posts', 'PostController')->parameters(['posts' => 'post:slug']);
        Route::resource('categories', 'CategoryController')->parameters(['categories' => 'category:slug']);
        Route::resource('tags', 'TagController')->parameters(['tags' => 'tag:slug']);
});

Route::get("{any?}", function(){
    // return view("guests.home");
    return redirect()->route('index');

})->where("any", ".*"); 

