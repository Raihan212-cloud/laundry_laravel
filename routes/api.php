<?php

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    $response = ['message' => 'API Sudah berjalan'];
    return response()->json($response);
});

// Harus Login Dulu Buat dapet token
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [ApiController::class, 'getUsers']);
    Route::get('me', [ApiController::class, 'me']);
});

Route::get('user', [ApiController::class, 'getUsers']);
Route::post('user', [ApiController::class, 'storeUser']);
Route::post('user/{id}', [ApiController::class, 'editUser']);
Route::post('user/{id}', [ApiController::class, 'updateUser']);
Route::delete('user/{id}', [ApiController::class, 'deleteUser']);

Route::post('login', [ApiController::class, 'loginAction']);
