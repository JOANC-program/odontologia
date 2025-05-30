<!DOCTYPE html>
<html>

<head>
    <title>Asignar Cita</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
    <link href="Vista/jquery/jquery-ui-1.14.1/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="Vista/jquery/jquery.js"></script>
    <script src="Vista/jquery/jquery-ui-1.14.1/jquery-ui.js" type="text/javascript"></script>
    <script src="Vista/js/script.js" type="text/javascript"></script>
</head>

<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Sistema de Gestión Odontológica</h1>
        </div>
        <ul id="menu">
            <li><a href="index.php?accion=paciente">inicio</a> </li>
            <li><a href="index.php?accion=consultar_paciente">Mis Citas</a> </li>
            <li><a href="index.php?accion=cancelar_paciente">Cancelar Cita</a>
            <li class="activa"><a href="/odontologia/index.php?accion=asignar_paciente">Agendar Cita</a> </li>
        </ul>
        <div id="contenido">
            <h2>Asignar cita</h2>
            <form id="frmasignar" action="index.php?accion=guardarCita" method="post">
                <input type="hidden" name="asignarDocumento" id="asignarDocumento"
                    value="<?php echo htmlspecialchars($doc); ?>">
                <table>
                    <tr>
                        <td>Médico</td>
                        <td>
                            <select id="medico" name="medico" onchange="cargarHoras()">
                                <option value="-1" selected="selected">---Selecione el Médico</option>
                                <?php while ($fila = $result->fetch_object()) { ?>
                                    <option value="<?php echo $fila->MedIdentificacion; ?>">
                                        <?php echo $fila->MedIdentificacion . " " . $fila->MedNombres . " " . $fila->MedApellidos; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td>
                            <input type="date" id="fecha" name="fecha" onchange="cargarHoras()">
                        </td>
                    </tr>
                    <tr>
                        <td>Consultorio</td>
                        <td>
                            <select id="consultorio" name="consultorio" onchange="cargarHoras()">
                                <option value="-1" selected="selected">---Selecione el Consultorio</option>
                                <?php while ($fila = $result2->fetch_object()) { ?>
                                    <option value="<?php echo $fila->ConNumero; ?>">
                                        <?php echo $fila->ConNumero . " - " . $fila->ConNombre; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Hora</td>
                        <td>
                            <select id="hora" name="hora" onmousedown="seleccionarHora()">
                                <option value="-1" selected="selected">---Seleccione la hora ---</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="asignarEnviar" value="Enviar" id="asignarEnviar"
                                onmousedown="enviar()">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
</body>

</html>