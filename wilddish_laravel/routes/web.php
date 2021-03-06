<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/seach',[App\Http\Controllers\SearchController::class,'index'])->name('search');


Route::get('/recipes', [App\Http\Controllers\RecipeController::class, 'index'])->name('index');

Route::get('/forms', [App\Http\Controllers\RecipeController::class, 'form'])->name('form');

Route::get('/list', [App\Http\Controllers\RecipeController::class, 'list'])->name('list');

Route::post('/recipe', [App\Http\Controllers\RecipeController::class, 'store'])->name('reicpe');

