<?php

use App\Http\Controllers\userController;
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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/banklist', function () {
    return view('banklist');

});

Route::get('/banklist2', 'BanklistController@list');

Route::redirect('password.reset', '/home', 301);

Route::resource('bank_registries','BankRegistryController');

Route::resource('bank_types','BankTypeController');

Auth::routes();


