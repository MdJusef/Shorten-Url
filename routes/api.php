<?php

use App\Http\Controllers\ShortLinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::post('generate-shorten-link',[ShortLinkController::class,'generateShortLink']);
//Route::get('shorten-link',[ShortLinkController::class,'getLink']);

Route::post('generate-shorten-link-url',[ShortLinkController::class,'generateShortLink']);
Route::get('generate-shorten-link',[ShortLinkController::class,'index']);

