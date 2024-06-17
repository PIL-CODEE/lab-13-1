<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Book;
use App\Models\Rent;
use App\Models\User;

class BooksUsersController extends Controller
{
    // Listar y Buscar libro
    public function index(Request $request)
    {

        $query = DB::table('books')
            ->leftJoin('rents', function ($join) {
                $join->on('books.id', '=', 'rents.id_libro')
                    ->where('rents.estado', '=', 'Alquilado');
            })
            ->select('books.id', 'books.titulo', 'books.año_edicion', 'books.autor', 'books.editorial', 'rents.estado');

        $busqueda = $request->busqueda;

            if ($busqueda) {
                $search_book = Book::where('titulo', 'like', '%' . $busqueda . '%')->get();
            } else {
                $search_book = collect();
            }
        

        $books = $query->get();

        $data = [
            'search_book' => $search_book,
            'books' => $books,
        ];

        return view('usuario.index', $data);
    }

    public function rentbook()
    {
        $books = Book::all();

        $data = [
            'books' => $books,
        ];

        return view('usuario.prestar', $data);
    }

    public function rent(Request $request)
    {

        $user = auth()->user();

        $rent = Rent::create([
            'id_libro' => $request->id_libro,
            'id_usuario' => $user->id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_devolucion' => $request->fecha_devolucion,
            'estado' => "Alquilado",
        ]);

        return redirect()->route('usuario.index');
    }

}
