<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'] )->name('tasks.index');

Route::get('/task/create', [TaskController::class, 'create'] )->name('tasks.create');
Route::post('/task/store', [TaskController::class, 'store'] )->name('tasks.store');

Route::patch('/tasks/{task}', [TaskController::class, 'update'] )->name('tasks.update');

Route::delete('/tasks/{task}', [TaskController::class, 'delete'] )->name('tasks.delete');

