<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{route('administrador.create-books')}}">
        <h2>AGREGAR LIBRO</h2>
        @csrf
        <label for="titulo">Titulo: </label>
        <input type="text" id="titulo" name="titulo" required autocomplete="off">
        <label for="año_edicion">Año de creación: </label>
        <input type="number" id="año_edicion" name="año_edicion" required autocomplete="off">
        <label for="autor">Autor: </label>
        <input type="text" id="autor" name="autor" required autocomplete="off">
        <label for="editorial">Editorial: </label>
        <input type="text" id="editorial" name="editorial" required autocomplete="off">
        <button type="submit"><b>AGREGAR</b></button>
    </form>
</body>
</html>