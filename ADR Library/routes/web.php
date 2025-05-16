<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [DashboardController::class, 'home']);

Route::get('/register', [FormController::class, 'register']);

Route::post('/welcome', [FormController::class, 'signup']); 


//logout
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/profile', [AuthController::class, 'getprofile'])->middleware('auth');
Route::post('/profile', [AuthController::class, 'createprofile'])->middleware('auth');
Route::put('/profile/{id}', [AuthController::class, 'updateprofile'])->middleware('auth');

Route::post('/comments/{books_id}', [CommentController::class, 'store'])->middleware('auth');

//R=read data
Route::get('/genre', [GenreController::class, 'index']);


Route::middleware(['auth', IsAdmin::class])->group(function () {

//C=create data
Route::get('/genre/create', [GenreController::class, 'create']);
Route::post('/genre', [GenreController::class, 'store']);


//U=update data
Route::get('/genre/{id}/edit', [GenreController::class, 'edit']);
Route::put('/genre/{id}', [GenreController::class, 'update']);

//D=delete data
Route::delete('/genre/{id}', [GenreController::class, 'destroy']);

});

Route::get('/genre/{id}', [GenreController::class, 'show']);    


//CRUD Books
Route::resource('books', BooksController::class);

//authentication
//register
Route::get('/register', [AuthController::class, 'showregister']);
Route::post('/register', [AuthController::class, 'registeruser']);

//login
Route::get('/login', [AuthController::class, 'showlogin']);
Route::post('/login', [AuthController::class, 'login']);


