<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['prefix' => '/home', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
