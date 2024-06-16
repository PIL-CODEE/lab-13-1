<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="">Pagina Privada @auth de {{Auth::user()->name}} @endauth</a>
        <a href="{{route('administrador.index')}}">Añadir/Modificar/Eliminar/Libros</a>
        <a href="{{route('logout')}}"><button type="button">Salir</button></a>
    </header>
    <h5>Buscar libro</h5>
    <form action="{{route('usuario.index')}}" method="GET">
        <input type="text" name="busqueda" placeholder="Buscar por título">
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
                <th></th>
            </tr>   
            </thead>
            <tbody>
            @foreach ($search_book as $search)
            <tr>
                <td>{{$search->titulo}}</td>
                <td>{{$search->año_edicion}}</td>
                <td>{{$search->autor}}</td>
                <td>{{$search->editorial}}</td>
                <td><a href="{{route('usuario.lend-books', $search->titulo)}}"><button>ALQUILAR</button></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <p>No se encontró el libro "{{ request()->input('busqueda') }}".</p>
        @endif
    @endif

    <h2>LIBROS</h2>
    <table>
        <thead>
            <tr>
                <th>TITULO</th>
                <th>AÑO DE CREACIÓN</th>
                <th>AUTOR</th>
                <th>EDITORIAL</th>
                <th></th>
            </tr>   
        </thead>
        <tbody>
            @foreach ($libros as $libro)
            <tr>
                <td>{{$libro->titulo}}</td>
                <td>{{$libro->año_edicion}}</td>
                <td>{{$libro->autor}}</td>
                <td>{{$libro->editorial}}</td>
                <td><a href="{{route('usuario.lend-books', $libro->titulo)}}"><button type="button">ALQUILAR</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>