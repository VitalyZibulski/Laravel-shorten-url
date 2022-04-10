<?php

use App\Http\Controllers\ShortLinkController;
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

Route::get('/links', [ShortLinkController::class, 'index'])->name('generate.short-link');
Route::post('/links', [ShortLinkController::class, 'store'])->name('generate.short-link-create');
Route::get('{link}', [ShortLinkController::class, 'getShortLink'])->name('short.link');
