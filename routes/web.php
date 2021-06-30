<?php

use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::post('addEmployee/divisions/{id}', 'DivisionController@addEmployee')->middleware('auth:manager')->name('divisions.addEmployee');
Route::post('removeEmployee/divisions/{id}', 'DivisionController@removeEmployee')->middleware('auth:manager')->name('divisions.removeEmployee');
Route::post('addManager/divisions/{id}', 'DivisionController@addManager')->middleware('auth:manager')->name('divisions.addManager');
Route::post('removeManager/divisions/{id}', 'DivisionController@removeManager')->middleware('auth:manager')->name('divisions.removeManager');
Route::resource('divisions', 'DivisionController')->middleware('auth:manager');
Route::resource('clients', 'ClientController');
Route::resource('discounts', 'DiscountController')->middleware('auth:manager');
Route::post('addMakarons/divisions/{id}', 'DiscountController@addMakarons')->middleware('auth:manager')->name('discounts.addMakarons');
Route::post('removeMakarons/divisions/{id}', 'DiscountController@removeMakarons')->middleware('auth:manager')->name('discounts.removeMakarons');
Route::resource('managers', 'ManagerController')->middleware('auth:manager');
Route::get('cart', 'CartController@index')->name('cart.index');
Route::post('cart', 'CartController@store')->name('cart.store');
Route::post('cart-amounts', 'CartController@amounts')->name('cart.amounts');
Route::get('form-order', 'CartController@order')->middleware('auth')->name('form.order');
Route::post('form-order', 'CartController@storeOrder')->middleware('auth')->name('form.storeOrder');
Route::get('review/{id}', 'ReviewController@create')->middleware('auth')->name('review.create');
Route::post('review/{id}', 'ReviewController@store')->middleware('auth')->name('review.store');
Route::delete('review/{id}', 'ReviewController@destroy')->middleware('auth:manager')->name('review.destroy');
Route::get('order/{id}', 'OrderController@show')->middleware('auth:manager')->name('order.show');
Route::post('switchLang', 'LocaleController@set')->name('lang.switch');

Route::get('audit', 'AuditController@index')->middleware(['admin'])->name('audit.index');

Route::post('manager/logout', function(Request $request) {
    $email = Auth::guard('manager')->user()->employee()->first()->email;
    Auth::guard('manager')->logout();
    Audit::create('auth-logout', $request, $email);
    return redirect('/');
})->middleware('auth:manager')->name('manager.logout');

Route::feeds();

require __DIR__.'/auth.php';
