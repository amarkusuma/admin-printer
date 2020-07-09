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

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('register');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('dataTable.printer', 'PrinterController@DataTablePrinters')->name('dataTable.printer');
Route::get('dataTable.user', 'UsersController@Datausers')->name('dataTable.user');

// Route::group(['middleware' => ['auth']], function () {
//     Route::get('printer', 'PrinterController@index')->name('printer');
//     Route::get('input-printer', 'PrinterController@input_printer')->name('input-printer');
//     Route::delete('printer.delete/{id}', 'PrinterController@destroy')->name('printer.delete');
//     Route::post('printer.show/{id}', 'PrinterController@show')->name('printer.show');
//     Route::post('printer.edit/{id}', 'PrinterController@edit')->name('edit-printer');
//     Route::post('input-printer', 'PrinterController@store')->name('input-printer');
//     Route::post('printer.update/{id}', 'PrinterController@update_printer')->name('printer.update'); 
// });
Route::group(['middleware' => ['auth']], function () {
    Route::get('order', 'OrderController@index')->name('order');
    // Route::get('input-order', 'orderController@input_order')->name('input-order');
    // Route::post('order.delete/{id}', 'orderController@destroy')->name('order.delete');
    // Route::post('order.show/{id}', 'orderController@show')->name('order.show');
    // Route::post('order.edit/{id}', 'orderController@edit')->name('edit-order');
    // Route::post('input-order', 'orderController@store')->name('input-order');
    // Route::post('order.update/{id}', 'orderController@update_order')->name('order.update');
    Route::get('dataTable.order', 'OrderController@DataTableOrder')->name('dataTable.order');
    // Route::post('import.pdf', 'OrderController@html')->name('import.pdf');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('product', 'ProductController@index')->name('product');
    Route::get('input-product', 'ProductController@input_product')->name('input-product');
    Route::post('product.delete/{id}', 'ProductController@destroy')->name('product.delete');
    Route::post('product.show/{id}', 'ProductController@show')->name('product.show');
    Route::post('product.edit/{id}', 'ProductController@edit')->name('edit-product');
    Route::post('input-product', 'ProductController@store')->name('input-product');
    Route::post('product.update/{id}', 'ProductController@update_product')->name('product.update');
    Route::get('dataTable.product', 'ProductController@DataTableProducts')->name('dataTable.product');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('user', 'UsersController@index')->name('user');
    Route::post('user.role/{id}', 'UsersController@user_role')->name('user-role');
    Route::post('user.role-update/{id}', 'UsersController@user_role_update')->name('user-role-update');
    Route::post('user.show/{id}', 'UsersController@show')->name('user-show');
    Route::post('user.delete/{id}', 'UsersController@destroy')->name('user.delete');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('role.create', 'RoleController@create')->name('create-role');
    Route::post('role.store', 'RoleController@store')->name('role-create');
    Route::get('roles', 'RoleController@index')->name('role-user');
    Route::get('role.edit/{id}', 'RoleController@edit')->name('role-edit');
    Route::post('role.update/{id}', 'RoleController@update')->name('role-update');
    Route::post('show_role/{id}', 'RoleController@showRole')->name('show_role');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/chat', 'ChatController@index')->name('chatting');
    Route::get('/online', 'ChatController@online');
    Route::get('messages', 'ChatController@getMessages');
    Route::post('messages', 'ChatController@broadcastMessage');
    Route::get('/user-chat', 'ChatController@user');

    Route::get('/coba/{id}', 'ChatController@coba');
});

// Route::resource('/role', 'RoleController')->except([
//     'create', 'show', 'edit', 'update'
// ]);

Route::group(['middleware' => 'auth'], function () {
    Route::post('getFriends', 'ChatController@getFriends');
    Route::post('/session/create', 'SessionController@create');
    Route::post('/session/{session}/chats', 'ChatController@chats');
    Route::post('/session/{session}/read', 'ChatController@read');
    Route::post('/session/{session}/clear', 'ChatController@clear');
    // Route::post('/session/{session}/block', 'BlockController@block');
    // Route::post('/session/{session}/unblock', 'BlockController@unblock');
    Route::post('/send/{session}', 'ChatController@send');
    Route::get('/private-chat', 'HomeController@chat')->name('private');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'PostinganController@input')->name('home');
    Route::post('/postingan' , 'PostinganController@post_postingan');
    Route::get('/getPostingan' , 'PostinganController@postingan');
    Route::get('/userOn' , 'PostinganController@user');
    Route::delete('/deletePostingan/{id}' , 'PostinganController@deletePostingan');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/komentar' , 'KomentarController@post_comment');
    Route::get('/getComment', 'KomentarController@getComment');
    Route::delete('/deleteComment/{id}/{postinganid}','KomentarController@Commentdestroy');
    // Route::get('/countComment/{id}' , 'KomentarController@countComment');

    Route::get('/getcoba/{id}' , 'KomentarController@coba');

    Route::post('/subkomentar' , 'KomentarController@post_subcomment');
    Route::get('/getSubcomment', 'KomentarController@getSubComment');
    // Route::get('/countSubcomment/{id}' , 'KomentarController@countSubcomment');
    Route::delete('/deleteSubcomment/{id}/{idcomment}','KomentarController@deleteSubcomment');
});

Broadcast::routes(['middleware' => ['api', 'web', 'auth']]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/userProfile', 'ProfileController@index')->name('profile-user');
    Route::get('/getProfile', 'ProfileController@profile');
    Route::post('/editProfile/{id}', 'ProfileController@editProfile');
});