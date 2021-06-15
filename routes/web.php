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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('store');
})->name('store'); //->middleware(['auth'])

Route::resource('makaroni', 'App\Http\Controllers\MakaroniController');
Route::resource('employees', 'App\Http\Controllers\EmployeeController');
Route::resource('machines', 'App\Http\Controllers\MachineController');
Route::resource('ingredients', 'App\Http\Controllers\IngredientController');
Route::resource('divisions', 'App\Http\Controllers\DivisionController');
Route::resource('clients', 'App\Http\Controllers\ClientController');
Route::resource('discounts', 'App\Http\Controllers\DiscountController');
Route::get('cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('form-order', 'App\Http\Controllers\CartController@order')->name('form.order');
Route::post('form-order', 'App\Http\Controllers\CartController@storeOrder')->name('form.storeOrder');

require __DIR__.'/auth.php';
