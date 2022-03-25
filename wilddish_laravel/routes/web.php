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

Route::get('/profile/myrecipes/{id}',[App\Http\Controllers\ProfileController::class,'myrecipes'])->name('profile.myrecipes');

// レシピ内容画面へのルート
Route::get('/recipes/{id}', [App\Http\Controllers\RecipeController::class, 'index'])->name('recipes');

// レシピ登録画面へのルート
Route::get('/forms', [App\Http\Controllers\FormController::class, 'form'])->name('form');

// レシピ一覧画面へのルート
Route::get('/list', [App\Http\Controllers\RecipeController::class, 'list'])->name('list');

// レシピ編集画面へのルート
Route::get('/edit/{id}', [App\Http\Controllers\EditController::class, 'edit'])->name('edit');

Route::post('/delete', [App\Http\Controllers\EditController::class, 'destroy'])->name('delete');

Route::post('/update/{recipeid}', [App\Http\Controllers\EditController::class, 'update'])->name('update');

Route::post('/recipe', [App\Http\Controllers\FormController::class, 'process1'])->name('recipe');

Route::post('/recipe', [App\Http\Controllers\FormController::class, 'process2'])->name('recipe');

Route::post('/recipe', [App\Http\Controllers\FormController::class, 'process3'])->name('recipe');

Route::post('/recipe', [App\Http\Controllers\FormController::class, 'process4'])->name('recipe');

Route::post('/recipe', [App\Http\Controllers\FormController::class, 'process5'])->name('recipe');

Route::post('/recipe', [App\Http\Controllers\FormController::class, 'store'])->name('recipe');


Route::get('', [App\Http\Controllers\topController::class, 'index'])->name('top');

Route::get('/topsearch', [App\Http\Controllers\topController::class, 'search'])->name('topsearch');



