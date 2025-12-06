<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//profile pages

Route::get('/register', [RecipeController::class, 'create'])->name('register');
Route::get('/login', [RecipeController::class, 'index']);

// Home page
Route::get('/', [RecipeController::class, 'index']);

// Browse recipes
Route::get('/recipes/browse', [RecipeController::class, 'browse'])
    ->name('recipes.browse');

// Recipe resource routes
Route::resource('recipes', RecipeController::class)
    ->middleware(['auth']);

// Profile overview page
Route::get('/profile', [ProfileController::class, 'show'])
    ->middleware('auth')
    ->name('profile');

// Update profile 
Route::patch('/profile', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update');

// Delete profile
Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->middleware('auth')
    ->name('profile.destroy');

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/recipes', [RecipeController::class, 'adminIndex'])
        ->name('admin.recipes');

    // Admin user management
    Route::get('/admin/create-admin', [App\Http\Controllers\AdminController::class, 'create'])
        ->name('admin.create');

    Route::post('/admin/create-admin', [App\Http\Controllers\AdminController::class, 'store'])
        ->name('admin.store');
});


require __DIR__ . '/auth.php';
