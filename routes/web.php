<?php

use App\Http\Controllers\BanklistController;
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



Route::group(['middleware' => ['auth']], function(){

    Route::redirect('password.reset', '/home', 301);

    Route::resource('bank_registries','BankRegistryController');

    Route::resource('bank_types','BankTypeController');

    Route::post('/search', 'BankRegistryController@search')->name('search');


});



Auth::routes();


