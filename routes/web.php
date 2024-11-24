<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
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