<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SwotController;
use App\Http\Controllers\SixHatController;
use App\Http\Controllers\ActionBrainstormingController;
use App\Http\Controllers\SharedSwotController;
use App\Http\Controllers\SharedSixHatController;
use App\Http\Controllers\SharedActionBrainstormingController;
use App\Http\Controllers\AuthController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', UserController::class);
Route::apiResource('swots', SwotController::class);
Route::middleware('auth:sanctum')->get('/swots', [SwotController::class, 'index']);
Route::apiResource('sixhats', SixHatController::class);
Route::middleware('auth:sanctum')->get('/six-hats', [SixHatController::class, 'index']);
Route::apiResource('actionbrainstormings', ActionBrainstormingController::class);
Route::middleware('auth:sanctum')->get('/action-brainstormings', [ActionBrainstormingController::class, 'index']);
Route::apiResource('shared-swots', SharedSwotController::class);
Route::apiResource('shared-sixhats', SharedSixHatController::class);
Route::apiResource('shared-actionbrainstormings', SharedActionBrainstormingController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


