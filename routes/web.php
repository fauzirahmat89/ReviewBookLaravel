<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [DashboardController::class, 'renderScreen']);
// Route::get('/register', [FormController::class, 'renderRegister']);
// Route::post('/register', [FormController::class, 'register']);

Route::middleware(['auth', IsAdmin::class])->group(function () {
    // CRUD
    // R
    
    Route::get('/genre/create',[GenreController::class, 'create']);
    ;


    // C 
    Route::post('/genre', [GenreController::class, 'store']);

    // U
    Route::get('/genre/{id}/edit', [GenreController::class, 'edit']);
    Route::put('/genre/{id}', [GenreController::class, 'update']);

    // D
    Route::delete('/genre/{id}', [GenreController::class, 'destroy']);

    
});

//genre
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);

// AUTH
Route::post('/register', [AuthController::class, 'createUser']);
Route::get('/register', [AuthController::class, 'renderRegister']);

//login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

//profile
Route::get('/profile', [AuthController::class, 'getProfile'])->middleware('auth');
Route::post('/profile', [AuthController::class, 'createProfile'])->middleware('auth');
Route::put('/profile/{id}', [AuthController::class, 'updateProfile'])->middleware('auth');
//AUTH

//comments
Route::post('/comments/{book_id}', [CommentController::class, 'store'])->middleware('auth');
//comments

// CRUD BOOKS
Route::resource('books', BooksController::class);