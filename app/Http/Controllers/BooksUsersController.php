<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rent;

class BooksUsersController extends Controller
{
    // Listar y Buscar libro
    public function index(Request $request)
    {
        $busqueda =  $request->busqueda;

        if ($busqueda) {
            $search_book = Book::where('titulo', 'like', '%' . $busqueda . '%')->get();
        } else {
            $search_book = collect();
        }

        $libros = Book::all();

        $data = [
            'libros' => $libros,
            'search_book' => $search_book,
        ];

        return view('usuario.index', $data);
    }

    public function rentbook($libro)
    {
        return view('usuario.prestar', ['libro' => $libro]);
    }

    public function rent()
    {
        return redirect()->route('usuario.index');
    }

}
