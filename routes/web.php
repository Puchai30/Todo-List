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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('todo')->as('todo.')->controller(TodoController::class)->group(function () {

    Route::get('index', 'index')->name('index');

    Route::get('create', 'create')->name('create');

    Route::post('store', 'store')->name('store');

    Route::get('show/{id}', 'show')->name('show');

    Route::get('{id}/edit', 'edit')->name('edit');

    Route::put('update', 'update')->name('update');

    Route::delete('destory', 'destory')->name('destory');
});

// Route::get('todo/index', 'index'])->name('todo.index');

// Route::get('todo/create', [TodoController::class, 'create'])->name('todo.create');

// Route::post('todo/store', [TodoController::class, 'store'])->name('todo.store');

// Route::get('todo/show/{id}', [TodoController::class, 'show'])->name('todo.show');

// Route::get('todo/{id}/edit', [TodoController::class, 'edit'])->name('todo.edit');

// Route::put('todo/update', [TodoController::class, 'update'])->name('todo.update');

// Route::delete('todo/destory', [TodoController::class, 'destory'])->name('todo.destory');
