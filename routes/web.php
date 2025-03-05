<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;



Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('rooms', RoomController::class);
});

use App\Http\Controllers\API\StagiaireController;

Route::get('/stagiaires', [StagiaireController::class, 'index']);
use App\Http\Controllers\API\GroupsController;

Route::get('/group', [GroupsController::class, 'index']);



