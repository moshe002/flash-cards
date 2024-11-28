<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Inertia\Inertia;


Route::get('/', [UserController::class, 'index']);

Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/home', function () {
    return Inertia::render('Home', ['name' => 'Moses']);
});

/**
 * can also do:
 * 
 * Route::inertia('/', 'Home');
 * 
 * to call simple pages
 * 
 */