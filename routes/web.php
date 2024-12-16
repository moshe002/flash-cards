<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FolderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Inertia\Inertia;


Route::get('/', [LoginController::class, 'index']);

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->middleware(['auth']);


Route::get('/home', function () {
    return Inertia::render('Home', ['name' => 'Moses']); 
})->middleware(['auth'])->name('home');


Route::get('/fetch-folder', [FolderController::class, 'index']);
Route::post('/create-folder', [FolderController::class, 'create']);
/**
 * 
 * Inertia::render('Home', ['name' => 'Moses']);
 * 
 * second parameter is how you pass props or data to the view (component)
 * 
 */

/**
 * can also do:
 * 
 * Route::inertia('/', 'Home');
 * 
 * to call simple pages
 * 
 */