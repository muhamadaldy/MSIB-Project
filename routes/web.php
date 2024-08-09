<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login']);
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/create', [UserController::class, 'create'])->name('User.create');
Route::get('/User', [UserController::class, 'index'])->name('index');
Route::get('/courses/{id}/edit', [UserController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{id}', [UserController::class, 'update'])->name('courses.update');
Route::get('/courses/create', [UserController::class, 'create'])->name('courses.create');
Route::post('/courses', [UserController::class, 'store'])->name('courses.store');
Route::delete('/courses/{id}', [UserController::class, 'destroy'])->name('courses.destroy');


