<?php

use App\Http\Controllers\Api\Auth\Facebook\AuthCallbackAction;
use App\Http\Controllers\Api\Auth\Facebook\AuthRedirectAction;
use App\Http\Controllers\Api\Webhook\Facebook\WebhookCallbackAction;
use App\Http\Controllers\Api\Webhook\Facebook\WebhookSubscribeAction;
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

Route::prefix('/facebook')->group(function () {
    Route::prefix('/auth')->group(function () {
        Route::get('/redirect', AuthRedirectAction::class);
        Route::post('/callback', AuthCallbackAction::class);
    });

    Route::prefix('/webhook')->group(function () {
        Route::get('/callback', WebhookSubscribeAction::class);
        Route::post('/callback', WebhookCallbackAction::class);
    });
});
