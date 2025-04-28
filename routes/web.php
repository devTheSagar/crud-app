<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'index'])->name('post.create');
Route::post('/', [PostController::class, 'insert'])->name('post.insert');
Route::get('view', [PostController::class, 'view'])->name('post.view');
Route::get('edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::post('update/{id}', [PostController::class, 'update'])->name('post.update');
Route::get('delete/{id}', [PostController::class, 'delete'])->name('post.delete');
