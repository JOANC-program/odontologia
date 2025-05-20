
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Médico</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
</head>
<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Agregar Médico</h1>
        </div>
        <div id="contenido">
            <form action="index.php?accion=guardarMedico" method="post">
                <table>
                    <tr>
                        <td>Identificación</td>
                        <td><input type="text" name="MedIdentificacion" required></td>
                    </tr>
                    <tr>
                        <td>Nombres</td>
                        <td><input type="text" name="MedNombres" required></td>
                    </tr>
                    <tr>
                        <td>Apellidos</td>
                        <td><input type="text" name="MedApellidos" required></td>
                    </tr>
                    <!-- Agrega más campos si tienes más -->
                    <tr>
                        <td colspan="2"><input type="submit" value="Guardar Médico"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>