<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inicio.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Bienvenido a la Clínica Odontológica</h1>
        <form action="login.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="contrasenalogin">Contraseña:</label>
            <input type="password" id="contrasenalogin" name="contrasenalogin" required>

            <label for="rollogin">Selecciona tu rol:</label>
            <select id="rollogin" name="rollogin" required>
                <option value="admin">Administrador</option>
                <option value="medico">Médico</option>
                <option value="paciente">Paciente</option>
            </select>

            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>

</html>