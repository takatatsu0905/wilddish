<?php

use Illuminate\Support\Facades\Route;
use wilddish_laravel\app\Http\Controllers\topController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/recipes', [App\Http\Controllers\RecipeController::class, 'index'])->name('recipes');

Route::get('/forms', [App\Http\Controllers\RecipeController::class, 'form'])->name('form');

Route::get('/list', [App\Http\Controllers\RecipeController::class, 'list'])->name('list');

Route::post('/recipe', [App\Http\Controllers\RecipeController::class, 'store'])->name('recipe');


Route::get('/top', [App\Http\Controllers\topController::class, 'index'])->name('top');

Route::post('/top', [App\Http\Controllers\topController::class, 'index'])->name('top');



