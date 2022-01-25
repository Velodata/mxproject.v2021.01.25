<?php
date_default_timezone_set('Australia/Brisbane');
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
// Route::view('register', 'user_register');
// Route::view('login', 'user_login');
// Route::view('account', 'user_account');
Route::resource('posts', 'PostsController');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/account', 'LoginController@account');
Route::get('/logout', 'LoginController@logout');
Route::get('/login', 'LoginController@login');
Route::get('/posts', 'PostsController@index');
Route::get('/tests', 'TestController@index');

Route::post('posts/changeStatus', [
    'as' => 'changeStatus',
    'uses' => 'PostsController@changeStatus',
]);

Route::post('addNewUser', 'LoginController@addNewUser');
Route::post('registerUser', 'LoginController@registerUser');
Route::post('loginUser', 'LoginController@loginUser');
Route::post('updateUser', 'LoginController@updateUser');
Route::post('addNewAddress', 'AddressController@addNewAddress');
Route::post('updateAddress', 'AddressController@updateAddress');
Route::post('deleteAddress', 'AddressController@deleteAddress');

Route::group(['middleware' => 'customAuth'], function () {
    Route::view('/add', 'add');
    Route::post('addResto', 'RestoController@addResto');
});
