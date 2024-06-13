<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksUsersController extends Controller
{
    // Listar libros
    public function index()
    {
        $libros = Book::all();
        return view('usuario.index', ['libros' => $libros]);
    }
}
