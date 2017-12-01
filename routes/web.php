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

/* Vendors routes */
Route::get('/vendors', function(){
    $user = Auth::user();
    if($user->is_admin == 1) {
        $vendors = \App\Vendors::all();
        
    } else {
        $vendors = User::find($user->id)->vendors();
    }
    return view('vendors.index', compact('vendors'));

})->name('vendors-list');

Route::get('/vendors/create', function(){
    return view('vendors.create');    
});

Route::get('/vendors/{id}/edit', 'VendorsController@edit');   
Route::post('/vendors/store', 'VendorsController@store');
Route::post('/vendors/update', 'VendorsController@update');

/* Types routes */
Route::get('/types', function(){
    $user = Auth::user();
    if($user->is_admin == 1) {
        $types = \App\Types::all();
        
    } else {
        $types = User::find($user->id)->types();
    }
    return view('types.index', compact('types'));
    
})->name('types-list');

Route::get('/types/create', function(){
    return view('types.create');    
});

Route::get('/types/{id}/edit', 'TypesController@edit');   
Route::post('/types/store', 'TypesController@store');
Route::post('/types/update', 'TypesController@update');
