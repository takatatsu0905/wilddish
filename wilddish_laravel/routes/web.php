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


Route::get('/profile',[App\Http\Controllers\ProfileController::class,'index'])->name('profile');
Route::get('/profile/edit/{id}',[App\Http\Controllers\ProfileUpdateController::class,'edit'])->name('profile.edit');
Route::post('/profile/update/{id}',[App\Http\Controllers\ProfileUpdateController::class,'update'])->name('profile.update');
// Route::post('/profile/add',[App\Http\Controllers\ProfileUpdateController::class,'store']);
Route::get('/seach',[App\Http\Controllers\SearchController::class,'search'])->name('search');

Route::get('/recipes', [App\Http\Controllers\RecipeController::class, 'index'])->name('recipes');


// レシピ内容画面へのルート
Route::get('/recipes', [App\Http\Controllers\RecipeController::class, 'index'])->name('recipes');

// レシピ登録画面へのルート

Route::get('/forms', [App\Http\Controllers\RecipeController::class, 'form'])->name('form');

// レシピ一覧画面へのルート
Route::get('/list', [App\Http\Controllers\RecipeController::class, 'list'])->name('list');

// レシピ編集画面へのルート
Route::get('/edit/{id}', [App\Http\Controllers\RecipeController::class, 'edit'])->name('edit');

Route::post('/delete', [App\Http\Controllers\RecipeController::class, 'delete'])->name('delete');

Route::post('/update/{recipeid}', [App\Http\Controllers\RecipeController::class, 'update'])->name('update');

Route::post('/recipe', [App\Http\Controllers\RecipeController::class, 'process1'])->name('recipe');

Route::post('/recipe', [App\Http\Controllers\RecipeController::class, 'process2'])->name('recipe');


Route::post('/recipe', [App\Http\Controllers\RecipeController::class, 'process3'])->name('recipe');

Route::post('/recipe', [App\Http\Controllers\RecipeController::class, 'process4'])->name('recipe');

Route::post('/recipe', [App\Http\Controllers\RecipeController::class, 'process5'])->name('recipe');

Route::post('/recipe', [App\Http\Controllers\RecipeController::class, 'store'])->name('recipe');


Route::get('/top', [App\Http\Controllers\topController::class, 'index'])->name('top');

Route::post('/top', [App\Http\Controllers\topController::class, 'index'])->name('top');


