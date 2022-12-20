<?php

use App\Http\Controllers\Api\Auth\Facebook\CallbackAction;
use App\Http\Controllers\Api\Auth\Facebook\RedirectAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/auth')->group(function () {
    Route::prefix('/facebook')->group(function () {
        Route::get('/redirect', RedirectAction::class);
        Route::post('/callback', CallbackAction::class);
    });
});
