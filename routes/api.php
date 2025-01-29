<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('task', [TaskController::class, 'index']);
Route::get('task/{id}', [TaskController::class, 'show']);
Route::post('task', [TaskController::class, 'store']);
Route::put('task/{id}', [TaskController::class, 'update']);
Route::delete('task/{id}', [TaskController::class, 'destroy']);
