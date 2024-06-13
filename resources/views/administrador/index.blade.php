<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>LIBROS</h2>
    <a href="{{route('administrador.register-books')}}"><button type="button">Registrar nuevo libro</button></a>
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
        <select  id="autor" name="autor">
            @foreach ($libros as $libro)
            <option>{{$libro->autor}}</option>
            @endforeach
        </select>
        <label for="editorial">Editorial: </label>
        <select  id="editorial" name="editorial">
            @foreach ($libros as $libro)
            <option>{{$libro->editorial}}</option>
            @endforeach
        </select>
        <button type="submit"><b>EDITAR</b></button>
    </form>
</body>
</html>