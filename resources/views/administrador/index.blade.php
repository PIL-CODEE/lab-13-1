<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/index-administrador.css')}}">
</head>
<body>
    <header>
        <a href="{{route('administrador.register-books')}}"><b>Registrar nuevo libro</b></a>
        <a href="{{route('usuario.index')}}"><b>Inicio</b></a>
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
                <td>
                    <a href="{{route('administrador.delete-books', $libro->titulo)}}"><button>Eliminar</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form method="POST" action="{{route('administrador.update-books')}}">
        <h2>MODIFICAR LIBRO</h2>
        @csrf
        <label for="titulo">Titulo: </label>
        <select  id="titulo" name="titulo">
            @foreach ($libros as $libro)
            <option value="{{$libro->titulo}}">{{$libro->titulo}}</option>
            @endforeach
        </select>
        <label for="año_edicion">Año de creación: </label>
        <input type="number" id="año_edicion" name="año_edicion" required autocomplete="off">
        <label for="autor">Autor: </label>
        <input type="text" id="autor" name="autor" required autocomplete="off">
        <label for="editorial">Editorial: </label>
        <input type="text" id="editorial" name="editorial" required autocomplete="off">
        <button type="submit"><b>EDITAR</b></button>
    </form>
    <h2>ALQUILERES</h2>
    <table>
        <thead>
            <tr>
                <th>ID_RESERVA</th>
                <th>ID_USUARIO</th>
                <th>ID_LIBRO</th>
                <th>FECHA DE ALQUILER</th>
                <th>FECHA DE DEVOLUCIÓN</th>
            </tr>   
        </thead>
        <tbody>
            @foreach ($alquileres as $alquiler)
            <tr>
                <td>{{$alquiler->id}}</td>
                <td>{{$alquiler->id_usuario}}</td>
                <td>{{$alquiler->id_libro}}</td>
                <td>{{$alquiler->fecha_inicio}}</td>
                <td>{{$alquiler->fecha_devolucion}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>