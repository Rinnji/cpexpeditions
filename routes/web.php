<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThesisController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('thesis/search', [ThesisController::class, 'search'])->name('thesis.search');
    Route::resource('favorites', FavoritesController::class)->only(['index', 'store']);

    Route::resource('thesis', ThesisController::class);
    Route::get('thesis.create', 'ThesisController@create')->middleware(AdminMiddleware::class);
    Route::post('thesis.post', 'ThesisController@post')->middleware(AdminMiddleware::class);
    Route::patch('thesis.update', 'ThesisController@update')->middleware(AdminMiddleware::class);
    Route::resource('users', UserController::class)->only(['index'])->middleware(AdminMiddleware::class);
});



require __DIR__ . '/auth.php';
