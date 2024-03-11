<?php

use App\Http\Controllers\ShortLinkController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('generate-shorten-link-url',[ShortLinkController::class,'generateShortLink'])->name('generate.shorten.link');
Route::get('shorten-link',[ShortLinkController::class,'getLink']);
Route::get('generate-shorten-link',[ShortLinkController::class,'index']);
