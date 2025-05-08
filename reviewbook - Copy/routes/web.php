<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [DashboardController::class, 'home']);

Route::get('/register', [FormController::class, 'register']);

Route::post('/welcome', [FormController::class, 'signup']); 
