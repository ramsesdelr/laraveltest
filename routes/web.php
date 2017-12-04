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
Route::get('/items/create', 'ItemsController@create')->name('items-create')->middleware('check-is-user');
Route::post('/items/store', 'ItemsController@store');
Route::get('/items', function () {
    $user = Auth::user();

    if ($user->is_admin == 1) {
        $items = Items::all()->paginate(10);
    } else {
        $items = \App\User::find($user->id)->items()->paginate(10);
    }

    return view('items.index', compact('items'));

})->name('items-list');

Route::get('/items/edit/{id}', 'ItemsController@edit');
Route::post('/items/update', 'ItemsController@update');

/* Vendors routes */
Route::get('/vendors', function () {
    $user = Auth::user();
    if ($user->is_admin == 1) {
        $vendors = \App\Vendors::all()->paginate(10);

    } else {
        $vendors = \App\User::find($user->id)->vendors()->paginate(10);
    }
    return view('vendors.index', compact('vendors'));

})->name('vendors-list');

Route::get('/vendors/create', function () {
    return view('vendors.create');
})->middleware('check-is-user');

Route::get('/vendors/{id}/edit', 'VendorsController@edit');
Route::post('/vendors/store', 'VendorsController@store')->middleware('check-is-user');
Route::post('/vendors/update', 'VendorsController@update');

/* Types routes */
Route::get('/types', function () {

    $user = Auth::user();
    $types = \App\Types::paginate(10);
    return view('types.index', compact('types'));

})->name('types-list')->middleware('check-is-admin');

Route::get('/types/create', function () {
    return view('types.create');
})->middleware('check-is-admin');

Route::get('/types/{id}/edit', 'TypesController@edit')->middleware('check-is-admin');
Route::post('/types/store', 'TypesController@store')->middleware('check-is-admin');
Route::post('/types/update', 'TypesController@update')->middleware('check-is-admin');

/** Users Routes */
Route::get('/users', function () {

    $users = \App\User::paginate(10);
    return view('users.index', compact('users'));

})->name('users-list')->middleware('check-is-admin');
