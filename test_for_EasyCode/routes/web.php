<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['prefix' => '/home', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/changeSettings', App\Http\Controllers\ChangeSettingsController::class)->name('changeSettings');
    Route::get('/ver', \App\Http\Controllers\VerController::class)->name('verify');
    Route::patch('/ver', \App\Http\Controllers\VerUpdateController::class)->name('verUpdate');

});
