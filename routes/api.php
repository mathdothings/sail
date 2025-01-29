<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('task', [TaskController::class, 'index']);
Route::get('task/{id}', [TaskController::class, 'show'])->name('task.get');
Route::post('task', [TaskController::class, 'store'])->name('task.store');
Route::put('task/{id}', [TaskController::class, 'update']);
Route::delete('task/{id}', [TaskController::class, 'destroy']);
