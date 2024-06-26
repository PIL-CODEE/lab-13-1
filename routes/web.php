<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BooksUsersController;
use App\Http\Controllers\LoginController;

Route::view('/login', "login")->name('login');
Route::view('/registro', "register")->name('registro');
Route::post('/validar-registro',[LoginController::class, 'register'])->name('validate-register');
Route::post('/inicia-sesion',[LoginController::class, 'login'])->name('start-sesion');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/crud', [BooksController::class, 'index'])->name('administrador.index');
    Route::view('/registrar_libro', "administrador.create")->name('administrador.register-books');
    Route::post('/crear_libro', [BooksController:: class, 'create'])->name('administrador.create-books');
    Route::get('/eliminar_libro/{book}', [BooksController::class, 'delete'])->name('administrador.delete-books');
    Route::post('/editar_libro', [BooksController:: class, 'update'])->name('administrador.update-books');

    Route::get('/alquilar_libro', [BooksUsersController:: class, 'rentbook'])->name('usuario.lend-books');
    Route::post('/rentar_libro', [BooksUsersController:: class, 'rent'])->name('usuario.rent-books');

});

Route::get('/', [BooksUsersController::class, 'index'])->name('usuario.index');
