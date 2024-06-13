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
                <td><a href=""><button>ALQUILAR</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>