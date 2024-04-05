<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThesisController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view("welcome");
});
Route::get('/about-us', function () {
    return view('about');
})->middleware(['auth', 'verified'])->name('about');



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
    Route::get('thesis/json_search', [ThesisController::class, 'json_search'])->name('thesis.json_search');
    Route::get('thesis/json_pagination', [ThesisController::class, 'json_pagination'])->name('thesis.json_pagination');
    Route::get('thesis/json_searchbar', [ThesisController::class, 'json_searchbar'])->name('thesis.json_searchbar');

    Route::resource('users', UserController::class)->middleware(AdminMiddleware::class);
    Route::resource('thesis', ThesisController::class)->only(['create', 'post', 'update', 'store', 'destroy'])->middleware(AdminMiddleware::class);
    Route::resource('thesis', ThesisController::class)->only(['search', 'show', 'index', 'json_search', 'json_pagination']);
});



require __DIR__ . '/auth.php';
