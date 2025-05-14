<!DOCTYPE html>
<html>

<head>
    <title>Consultar Cita</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
    <script type="text/javascript" src="Vistas/jquery/jquery.js"></script>
    <script type="text/javascript" src="Vista/js/script.js"></script>
</head>

<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Sistema de Gestión Odontológica</h1>
        </div>
        <ul id="menu">
            <li><a href="index.php">inicio</a> </li>
            <li><a href="index.php?accion=asignar">Asignar</a> </li>
            <li class="activa"><a href="index.php?accion=consultar">Consultar Cita</a>
            </li>
            <li><a href="index.php?accion=cancelar">Cancelar Cita</a> </li>
        </ul>
        <div id="contenido">
            <h2>Consultar Cita</h2>
            <form action="index.php?accion=consultarCita" method="post" id="frmconsultar">
                <table>
                    <tr>
                        <td>Documento del paciente</td>
                        <td><input type="text" name="asignarDocumento" id="asignarDocumento"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" value="Consultar" name="asignarConsultar"
                                id="asignarConsultar"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="paciente"></div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>