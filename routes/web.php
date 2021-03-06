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

use App\Http\Controllers\UserAdminController;
use Illuminate\Support\Facades\Route as Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/page1', function () {
    return view('page1');
});
Route::get('/page2', function () {
    return view('page2');
});
Route::get('/page3', function () {
    return view('page3');
});

Route::resource('/admin/users', 'UserAdminController', ['names' => [
    'index' => 'user-admin',
    'update' => 'user-admin.update',
    'create' => 'user-admin.create',
    'edit' => 'user-admin.edit',
    'store' => 'user-admin.store',
    'destroy' => 'user-admin.destroy'
]]);

Route::get('/admin/users/{user}/delete', 'UserAdminController@destroy');

Auth::routes();
