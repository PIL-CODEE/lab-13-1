<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="{{asset('css/index-usuario.css')}}">
</head>
<body>
    <header>
        <a href="{{route('usuario.lend-books')}}"><b>Alquilar libro</b></a>
        <a href=""><b>Cuenta @auth de {{Auth::user()->name}} @endauth</b></a>
        <a href="{{route('logout')}}"><button type="button"><b>Salir</b></button></a>
    </header>
    <h1><b>Leyendo Horizontes</b></h1>
    <form action="{{route('usuario.index')}}" method="GET">
        <input type="text" name="busqueda" placeholder="Buscar libro por título" autocomplete="off">
        <input type="submit" value="Buscar">
    </form>
    @if (request()->has('busqueda') && trim(request()->input('busqueda')) !== '')
        @if ($search_book->count() > 0)
        <table>
            <thead>
            <tr>
                <th>TITULO</th>
                <th>AÑO DE CREACIÓN</th>
                <th>AUTOR</th>
                <th>EDITORIAL</th>
                <th>ESTADO</th>
            </tr>   
            </thead>
            <tbody>
            @foreach ($search_book as $search)
            <tr>
                <td>{{$search->titulo}}</td>
                <td>{{$search->año_edicion}}</td>
                <td>{{$search->autor}}</td>
                <td>{{$search->editorial}}</td>
            @endforeach
                <td>
                    @if ($books->contains('id', $search->id))
                        {{ $books->firstWhere('id', $search->id)->estado ?? 'Disponible' }}
                    @else
                        Disponible
                    @endif
                </td>
            </tr>
            
            </tbody>
        </table>
        @else
            <p>No se encontró el libro "{{ request()->input('busqueda') }}".</p>
        @endif
    @endif

    <h1>LIBROS</h1>
    <table>
        <thead>
            <tr>
                <th>TITULO</th>
                <th>AÑO DE CREACIÓN</th>
                <th>AUTOR</th>
                <th>EDITORIAL</th>
                <th>ESTADO</th>
            </tr>   
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{$book->titulo}}</td>
                <td>{{$book->año_edicion}}</td>
                <td>{{$book->autor}}</td>
                <td>{{$book->editorial}}</td>
                <td>{{$book->estado ? $book->estado : 'Disponible'}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>