<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TodoController;
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



Auth::routes();

Route::get('/', [TodoController::class, 'index'])->name('todo.index');

Route::get('todo/show/{id}', [TodoController::class, 'show'])->name('todo.show');

Route::middleware('can:admin')->group(function () {

Route::get('todo/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('todo/store', [TodoController::class, 'store'])->name('todo.store');

Route::get('todo/{id}/edit', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('todo/update', [TodoController::class, 'update'])->name('todo.update');
Route::delete('todo/destory', [TodoController::class, 'destory'])->name('todo.destory');
});
