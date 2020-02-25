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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-contractor', 'ContractorController@index')->name('addData');
Route::get('/all-contractor', 'ContractorController@allContractor')->name('allContractor');

Route::post('/create-contractor', 'ContractorController@store')->name('create-contractor');
Route::get('/edit-contractor/{id}', 'ContractorController@edit')->name('edit-contractor');
Route::post('/update-contractor/{id}', 'ContractorController@update')->name('update-contractor');
Route::get('/contractor/{id}', 'ContractorController@show')->name('show-contractor');
Route::get('/delete-contractor/{id}', 'ContractorController@destroy')->name('delete-contractor');
Route::post('/register-user', 'Auth\RegisterController@registerUser')->name('registerUser');
Route::get('/all-users', 'Auth\RegisterController@allUsers')->name('allUsers');
Route::delete('/delete-user/{id}', 'Auth\RegisterController@deleteUser')->name('deleteUser');

Route::get('/contract-filter', 'ContractorController@filtered_contract')->name('filtered-contract');

Route::get('user/{id}/edit', 'Auth\RegisterController@editUser')->name('userEdit');
Route::put('user/{id}/update', 'Auth\RegisterController@updateUser')->name('UserUpdate');

