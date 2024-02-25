<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LinkController::class, 'showAddingLinkForm'])->name('home');
Route::get('/{shortLink}', [LinkController::class, 'redirectByShortLink']);
Route::get('/links/{shortLink}', [LinkController::class, 'showLink'])->name('link.show');
Route::post('/links', [LinkController::class, 'createLink'])->name('link.create');
