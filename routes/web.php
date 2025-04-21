<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('categories/{category}', [CategoriesController::class, 'show'])->name('category.show');

Route::get('posts', [PostController::class, 'index'])->name('posts');

Route::get('home', [HomeController::class, 'index'])->name('home.index');
Route::get('mision_vision', [HomeController::class, 'mision_vision'])->name('home.mision_vision');
Route::get('contact', [HomeController::class, 'contact'])->name('home.contact');
