<?php

use App\Http\Controllers\Auth\ManagerLoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::name('manager.')->prefix('manager')->group(function() {

    Route::namespace('Auth')->middleware('guest:manager')->group(function() {
        Route::get('/login', 'ManagerLoginController@login')->name('login');
        Route::post('/login', 'ManagerLoginController@processLogin');
    });

    Route::namespace('Auth')->middleware('auth:manager')->group(function() {

        Route::post('/logout', function(){
            Auth::guard('manager')->logout();
            return redirect()->action([
                ManagerLoginController::class,
                'login'
            ]);
        })->name('logout');

    });
});
