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

/*  Items Routes */
Route::get('/items/create', 'ItemsController@create')->name('items-create');
Route::post('/items/store', 'ItemsController@store');
Route::get('/items', function () {

    $user = Auth::user();
    
    if ($user->can('view', Items::class)) {
        $items = Items::all();
    } else {
        $items = \App\User::find($user->id)->items;
    }

    return view('items.index', compact('items'));

})->name('items-list');

Route::get('/items/edit/{id}', 'ItemsController@edit');
Route::post('/items/update', 'ItemsController@update');

