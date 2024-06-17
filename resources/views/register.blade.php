<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
</head>
<body>
    <form method="POST" action="{{route('validate-register')}}">
        <h2>REGÍSTRATE</h2>
        @csrf
        <label for="emailInput">Email: </label>
        <input type="email" id="emailInput" name="email" required autocomplete="disable">
        <label for="passwordInput">Contraseña: </label>
        <input type="password" id="passwordInput" name="password" required>
        <label for="userInput">Nombre: </label>
        <input type="text" id="userInput" name="name" required autocomplete="disable">
        <label for="typeuserInput">Tipo de Usuario: </label>
        <select  id="typeuserInput" name="tipo_usuario">
            <option>Lector</option>
        </select>
        <button type="submit"><b>Registrarse</b></button>
    </form>
</body>
</html>