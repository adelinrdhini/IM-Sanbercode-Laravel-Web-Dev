<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [DashboardController::class, 'home']);

Route::get('/register', [FormController::class, 'register']);

Route::post('/welcome', [FormController::class, 'signup']); 

//C=create data
Route::get('/genre/create', [GenreController::class, 'create']);
Route::post('/genre', [GenreController::class, 'store']);

//R=read data
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);    

//U=update data
Route::get('/genre/{id}/edit', [GenreController::class, 'edit']);
Route::put('/genre/{id}', [GenreController::class, 'update']);

//D=delete data
Route::delete('/genre/{id}', [GenreController::class, 'destroy']);