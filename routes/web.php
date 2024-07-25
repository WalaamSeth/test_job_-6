<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/news', [PageController::class, 'news'])->name('news');

Route::get('/{citySlug}', [PageController::class, 'index'])->name('city.home');
Route::get('/{citySlug}/about', [PageController::class, 'about'])->name('city.about');
Route::get('/{citySlug}/news', [PageController::class, 'news'])->name('city.news');


