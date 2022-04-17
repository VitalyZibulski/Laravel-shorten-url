<?php

use App\Http\Controllers\Api\v1\ApiShortLinkController;
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

Route::get('/links', [ApiShortLinkController::class, 'index'])->name('generate.short-link');
Route::post('/links', [ApiShortLinkController::class, 'store'])->name('generate.short-link-create');
Route::get('{link}', [ApiShortLinkController::class, 'getShortLink'])->name('short.link');
