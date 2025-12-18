<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PartnerController;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function() {
    Route::post('register','register');
    Route::post('login','login');
    Route::post('logout','logout')->middleware('auth:sanctum');
});
Route::apiResource('coach',CoachController::class);
Route::apiResource('game',GamesController::class);
Route::apiResource('package',PackagesController::class);
Route::apiResource('partner',PartnerController::class);
Route::apiResource('content',ContentController::class);