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
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('register');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('printer', 'PrinterController@index')->name('printer');
Route::get('input-printer', 'PrinterController@input_printer')->name('input-printer');
Route::delete('printer.delete/{id}', 'PrinterController@destroy')->name('printer.delete');
Route::post('printer.show/{id}', 'PrinterController@show')->name('printer.show');
Route::post('printer.edit/{id}', 'PrinterController@edit')->name('edit-printer');
Route::post('input-printer', 'PrinterController@store')->name('input-printer');
Route::get('dataTable.printer', 'PrinterController@DataTablePrinters')->name('dataTable.printer');