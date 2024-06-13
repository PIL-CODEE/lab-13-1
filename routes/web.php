<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BooksUsersController;

Route::get('/', [BooksController::class, 'index'])->name('administrador.index');
Route::view('/registrar_libro', "administrador.create")->name('administrador.register-books');
Route::post('/crear_libro', [BooksController:: class, 'create'])->name('administrador.create-books');
Route::get('/eliminar-libro/{book}', [BooksController::class, 'delete'])->name('administrador.delete-books');
Route::post('/editar_libro', [BooksController:: class, 'update'])->name('administrador.update-books');

Route::get('/inicio', [BooksUsersController::class, 'index'])->name('usuario.index');