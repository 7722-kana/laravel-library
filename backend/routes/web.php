<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [AuthorController::class, 'index'])->name('index');

    Route::group(['prefix' => 'author', 'as' => 'author.'], function(){
        Route::get('/create', [AuthorController::class, 'create'])->name('create');
        Route::post('/store', [AuthorController::class, 'store'])->name('store');
        Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
        Route::get('/{id}/edit', [AuthorController::class, 'edit'])->name('edit');
        Route::patch('/{id}/update', [AuthorController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [AuthorController::class, 'delete'])->name('delete');
        Route::delete('/{id}/destroy', [AuthorController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'book', 'as' => 'book.'], function(){
        Route::get('/bookcreate', [BookController::class, 'bookcreate'])->name('bookcreate');
        Route::post('/bookstore', [BookController::class, 'bookstore'])->name('bookstore');
        Route::get('/{id}/show', [BookController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [BookController::class, 'edit'])->name('edit');
        Route::patch('/{id}/update', [BookController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [BookController::class, 'delete'])->name('delete');
        Route::delete('/{id}/destroy', [BookController::class, 'destroy'])->name('destroy');
    });

});
