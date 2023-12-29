<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'create'])->name('home');

Route::get('dashboard', [TaskController::class, 'create'])
    ->name('dashboard')
    ->middleware('auth');
Route::post('tasks', [TaskController::class, 'store'])
    ->name('task.store')
    ->middleware('auth');;

Route::get('tasks', [TaskController::class, 'index'])
    ->name('task.index')
    ->middleware('auth');
Route::get('tasks/{task}', [TaskController::class, 'show'])
    ->name('task.show')
    ->middleware('auth');

Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])
    ->name('task.edit')
    ->middleware('auth');
Route::patch('tasks/{task}', [TaskController::class, 'update'])
    ->name('task.update')
    ->middleware('auth');

Route::delete('tasks/{task}', [TaskController::class, 'delete'])
    ->name('task.delete')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
