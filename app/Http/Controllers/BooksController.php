<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rent;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    // Listar libros
    public function index()
    {
        $libros = Book::all();
        $alquileres = Rent::all();

        $data = [
            'libros' => $libros,
            'alquileres' => $alquileres
        ];

        return view('administrador.index', $data);
    }

    // Agregar libro
    public function create(Request $request)
    {
        // Validar los datos enviados desde un formulario
        $validate_book = $request->validate([
            'titulo' => 'required|string|max:100',
            'año_edicion' => 'required|integer|min:1000|max:' . date('Y'),
            'autor' => 'required|string|max:50',
            'editorial' => 'required|string|max:50',
        ]);

        Book::create($validate_book);

        return redirect()->route('administrador.index');
    }

    // Modificar libro
    public function update(Request $request)
    {

        $update_book = Book::where('titulo', $request->titulo)->update([
            'año_edicion' => $request->año_edicion,
            'autor' => $request->autor,
            'editorial' => $request->editorial,
            ]);;

        return redirect()->route('administrador.index');
    }    

    // Eliminar libro
    public function delete($book)
    {
        $delete_book = Book::where('titulo', $book);
        $delete_book->delete();

        return redirect()->route('administrador.index');
    }

}
