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
Route::resource('cart', 'CartController');
Route::resource('employees', 'EmployeeController')->middleware('auth:manager');
Route::resource('machines', 'MachineController')->middleware('auth:manager');
Route::resource('ingredients', 'IngredientController')->middleware('auth:manager');
Route::resource('divisions', 'DivisionController')->middleware('auth:manager');
Route::resource('clients', 'ClientController')->middleware('auth:manager');
Route::resource('discounts', 'DiscountController')->middleware('auth:manager');
Route::resource('managers', 'ManagerController')->middleware('auth:manager');
Route::get('cart', 'CartController@index')->name('cart.index');
Route::post('cart', 'CartController@store')->name('cart.store');
Route::get('form-order', 'CartController@order')->middleware('auth')->name('form.order');
Route::post('form-order', 'CartController@storeOrder')->middleware('auth')->name('form.storeOrder');
Route::get('review/{id}', 'ReviewController@create')->middleware('auth')->name('review.create');
Route::post('review/{id}', 'ReviewController@store')->middleware('auth')->name('review.store');
Route::delete('review/{id}', 'ReviewController@destroy')->middleware('auth:manager')->name('review.destroy');
Route::post('switchLang', 'LocaleController@set')->name('lang.switch');

Route::feeds();

require __DIR__.'/auth.php';
