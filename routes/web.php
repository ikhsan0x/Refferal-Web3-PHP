<?php

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


Route::get('/', 'ReferralController@index');
Route::get('/fall', 'ReferralController@fall');
Auth::routes();

Route::post('/signin', 'Auth\LoginController@signin')->name('signin');
Route::post('/signup', 'Auth\RegisterController@signup')->name('signup');
Route::get('/address/reset', 'Auth\LoginController@resetaddress')->name('address.request');
Route::get('/confirm', 'Auth\LoginController@confirm')->name('confirm');

Route::post('/address/reset', 'Auth\LoginController@resetaddresssave')->name('reset.pass');
Route::get('/register/{ref}', 'Auth\RegisterController@getformsignupref')->name('form.signup.ref');
Route::post('/signup/{ref}', 'Auth\RegisterController@signupref')->name('signup.ref');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/sample','WithdrawController');





//admin rote

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/registeradmin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::get('/admin', 'AdminController@index');
Route::get('/Users', 'AdminController@getuser')->name('user.all');
Route::get('/withdraw', 'AdminController@getwithdraw')->name('withdraw.all');
Route::get('/confirmwith/{id}', 'AdminController@confirmwith')->name('confirmwith');
Route::get('/rejectwith/{id}', 'AdminController@rejectwith')->name('rejectwith');
Route::get('/manager', 'AdminController@manager')->name('manager');
Route::post('/manager/store', 'AdminController@managerstore')->name('managerstore');
