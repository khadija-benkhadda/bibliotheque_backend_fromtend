<?php

use App\Http\Controllers\API\GroupsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StagiaireController;

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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->apiResource('stagiaires', StagiaireController::class);
Route::middleware('auth:sanctum')->apiResource('groups', GroupsController::class);

use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::get('stagiaires', [StagiaireController::class, 'index']);
// Route::post('stagiaires', [StagiaireController::class, 'store']);
Route::apiResource('stagiaires', StagiaireController::class);
Route::apiResource('groups', GroupsController::class);




