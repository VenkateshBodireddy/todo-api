<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\AuthController;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:api')->group(function () {
    Route::apiResource('tasks', TaskController::class);
});
Route::post('register',[AuthController::class,'register']); 
Route::post('login',[AuthController::class,'login']); 
Route::get('tasks',[TaskController::class,'index']);
Route::get('tasks/{id}',[TaskController::class,'show']);
Route::get('tasks/{id}/edit',[TaskController::class,'edit']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('tasks',[TaskController::class,'store']); 
    Route::put('tasks/{id}/edit',[TaskController::class,'update']);
    Route::delete('tasks/{id}/delete',[TaskController::class,'destroy']); 
    Route::post('logout',[AuthController::class,'logout']); 

});

// Route::post('tasks',[TaskController::class,'store']); 
// Route::put('tasks/{id}/edit',[TaskController::class,'update']);
// Route::delete('tasks/{id}/delete',[TaskController::class,'destroy']); 



