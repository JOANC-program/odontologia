
<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Médico</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
</head>
<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Eliminar Médico</h1>
        </div>
        <div id="contenido">
            <?php $fila = $result->fetch_object(); ?>
            <form action="index.php?accion=guardarEliminacionMedico" method="post">
                <input type="hidden" name="MedIdentificacion" value="<?php echo $fila->MedIdentificacion; ?>">
                <p>¿Estás seguro de que deseas eliminar el siguiente médico?</p>
                <table>
                    <tr>
                        <td>Identificación:</td>
                        <td><?php echo $fila->MedIdentificacion; ?></td>
                    </tr>
                    <tr>
                        <td>Nombres:</td>
                        <td><?php echo $fila->MedNombres; ?></td>
                    </tr>
                    <tr>
                        <td>Apellidos:</td>
                        <td><?php echo $fila->MedApellidos; ?></td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Eliminar Médico">
                <a href="index.php?accion=medicos" class="boton">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>