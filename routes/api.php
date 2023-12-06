<?php

use App\Http\Controllers\AlimentosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::post('/auth', [AuthController::class, 'login']);
Route::post('/createUser', [AuthController::class, 'register']);
Route::middleware('jwt.auth')->group(function () {
    Route::get('/getUser', [UserController::class, 'getUser']);
    Route::get('/getAlimentos', [AlimentosController::class, 'index']);
    Route::post('/saveAlimentos', [AlimentosController::class, 'save']);
    Route::post('/updateAlimentos', [User::class, 'update']);
});
