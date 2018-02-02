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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/order', 'OrderController@show');

Route::get('/expenses', 'ExpensesController@show');

Route::get('/all-expenses', 'AllExpensesController@show');

Route::post('/opt-in', 'ExpensesController@optin');

Route::post('/order', 'OrderController@create');

Route::get('/admin/admin', 'AdminController@show');

Route::get('/admin/admin-overview', 'AdminController@showOverview');

Route::post('/admin/admin-overview', 'AdminController@mailOverview');

Route::post('/admin/admin-overview-delete', 'AdminController@removeOverview');

Route::get('/admin/admin-rights', 'AdminController@showRights');

Route::post('/admin/admin-rights', 'AdminController@grantRights');

Route::get('/admin/admin-price', 'AdminController@showPrice');

Route::post('/admin/admin-price', 'AdminController@changePrice');

Route::get('/admin/admin-sodatype', 'AdminController@showSodaTypes');

Route::post('/admin/admin-sodatype', 'AdminController@changeSodaTypes');

Auth::routes();
