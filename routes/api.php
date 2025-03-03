<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user/profile', function( Request $request)
{
    return $request->user();
});
Route::get('/test-token', function () {
    $user = \App\Models\User::first();
    $token = $user->createToken('test-token')->plainTextToken;
    return $token;
});


// CategoryController
Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/create', [CategoryController::class, 'create']);
    Route::put('/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/delete/{id}', [CategoryController::class,'delete']);
  
});

// RoleController
Route::prefix('role')->group(function () {
    Route::get('/', [RoleController::class, 'index']);
    Route::post('/create', [RoleController::class, 'create']);
    Route::put('/update/{id}', [RoleController::class, 'update']);
    Route::delete('/delete/{id}', [RoleController::class,'delete']);
  
});

//UserController
Route::prefix('user')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/getProfile', [UserController::class, 'getProfile']);
    Route::put('/updateProfile', [UserController::class,'updateProfile']);
    Route::delete('/deleteUser', [UserController::class,'deleteUser']);
});


Route::prefix('auth')->group(function () {
    // Các route không cần bảo vệ (không yêu cầu token)
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // Các route bảo vệ bởi token (sử dụng Sanctum)
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/check-auth', [AuthController::class, 'checkAuthUser']);
    });
});



// //AuthController
// Route::middleware(['web'])->prefix('auth')->group(function () {
//     Route::post('/login', [AuthController::class, 'login']);
//     Route::get('/checkAuthUser', [AuthController::class, 'checkAuthUser']);
//     // Route::put('/update/{user_id}', [StoreController::class, 'update_profile']);
//     // Route::get('/findStoreById/{store_id}', [StoreController::class, 'findStoreById']);
//     // Route::get('/findStoreByOwnId/{user_id}', [StoreController::class, 'findStoreByOwnId']);
    
// });