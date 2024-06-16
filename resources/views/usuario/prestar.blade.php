<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{route('usuario.rent-books')}}">
        <h2>ALQUILAR LIBRO</h2>
        @csrf
        <label for="titulo">Libro: </label>
        <input type="text" id="titulo" name="titulo" value="{{$libro}}" readonly>
        <label for="fecha_inicio">Fecha de alquiler: </label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" readonly value="{{ date('Y-m-d') }}">
        <label for="fecha_devolucion">Fecha de devolución: </label>
        <input type="date" id="fecha_devolucion" name="fecha_devolucion" required autocomplete="off">
        <button type="submit"><b>ALQUILAR</b></button>
    </form>
</body>
</html>