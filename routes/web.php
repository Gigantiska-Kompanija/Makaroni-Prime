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

Route::get('/', 'MakaroniController@storeView')->name('store'); //->middleware(['auth'])

Route::resource('makaroni', 'MakaroniController');
Route::resource('employees', 'EmployeeController');
Route::resource('machines', 'MachineController');
Route::resource('ingredients', 'IngredientController');
Route::resource('divisions', 'DivisionController');
Route::resource('clients', 'ClientController');
Route::resource('discounts', 'DiscountController');
Route::get('cart', 'CartController@index')->name('cart.index');
Route::get('form-order', 'CartController@order')->name('form.order');
Route::post('form-order', 'CartController@storeOrder')->name('form.storeOrder');
Route::get('review/{$id}', 'ReviewController@create')->name('review.create');
Route::post('review/{$id}', 'ReviewController@create')->name('review.store');

require __DIR__.'/auth.php';
