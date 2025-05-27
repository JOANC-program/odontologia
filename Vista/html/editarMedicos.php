
<!DOCTYPE html>
<html>
<head>
    <title>Editar Médico</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
    <link href="Vista/jquery/jquery-ui-1.14.1/jquery-ui.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="Vista/jquery/jquery.js"></script>
    <script src="Vista/jquery/jquery-ui-1.14.1/jquery-ui.js" type="text/javascript"></script>
    <script src="Vista/js/script.js" type="text/javascript"></script>
</head>
<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Editar Médico</h1>
        </div>
        <div id="contenido">
            <?php $fila = $result->fetch_object(); ?>
            <form action="index.php?accion=guardarEdicionMedico" method="post">
                <table>
                    <tr>
                        <td>Identificación</td>
                        <td><input type="text" name="MedIdentificacion" value="<?php echo $fila->MedIdentificacion; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Nombres</td>
                        <td><input type="text" name="MedNombres" value="<?php echo $fila->MedNombres; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Apellidos</td>
                        <td><input type="text" name="MedApellidos" value="<?php echo $fila->MedApellidos; ?>" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Guardar Cambios"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>