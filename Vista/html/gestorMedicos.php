<!DOCTYPE html>
<html>

<head>
    <title>Sistema de Gestión Odontológica</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
    <link rel="stylesheet" href="Vista/jquery/jquery-ui-1.14.1/jquery-ui.css">
    <script src="Vista/jquery/jquery.js"></script>
    <script src="Vista/jquery/jquery-ui-1.14.1/jquery-ui.js"></script>
    <script src="Vista/js/script.js"></script>
</head>

<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Sistema de Gestión Odontológica</h1>
        </div>
        <ul id="menu">
            <li><a href="index.php">inicio</a> </li>
            <li><a href="index.php?accion=asignar">Asignar</a> </li>
            <li><a href="index.php?accion=consultar">Consultar Cita</a> </li>
            <li><a href="index.php?accion=cancelar">Cancelar Cita</a> </li>
            <li class="activa"><a href="index.php?accion=medicos">Gestor Medico</a></li>
        </ul>
        <div id="contenido">
            <h2>Consultar Medicos</h2>
            <a href="#" class="boton boton-agregar" id="abrirModalAgregarMedico">
                <span class="icono-mas">+</span> Agregar Médico
            </a>
            <div id="frmMedico" title="Agregar Nuevo Médico" style="display:none;">
                <form id="agregarMedico">
                    <table>
                        <tr>
                            <td>Identificación</td>
                            <td><input type="text" name="MedIdentificacion" id="MedIdentificacion"></td>
                        </tr>
                        <tr>
                            <td>Nombres</td>
                            <td><input type="text" name="MedNombres" id="MedNombres"></td>
                        </tr>
                        <tr>
                            <td>Apellidos</td>
                            <td><input type="text" name="MedApellidos" id="MedApellidos"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <!-- Modal para Editar Médico -->
            <div id="frmEditarMedico" title="Editar Médico" style="display:none;">
                <form id="editarMedico">
                    <table>
                        <tr>
                            <td>Identificación</td>
                            <td><input type="text" name="MedIdentificacion" id="editMedIdentificacion" readonly></td>
                        </tr>
                        <tr>
                            <td>Nombres</td>
                            <td><input type="text" name="MedNombres" id="editMedNombres"></td>
                        </tr>
                        <tr>
                            <td>Apellidos</td>
                            <td><input type="text" name="MedApellidos" id="editMedApellidos"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
            if (isset($result) && $result->num_rows > 0) {
                echo "<table border='1'>";
                echo "<tr><th>Identificación</th><th>Nombres</th><th>Apellidos</th><th>Accion1</th><th>Accion2</th></tr>";
                while ($fila = $result->fetch_object()) {
                    echo "<tr>";
                    echo "<td>" . $fila->MedIdentificacion . "</td>";
                    echo "<td>" . $fila->MedNombres . "</td>";
                    echo "<td>" . $fila->MedApellidos . "</td>";
                    echo "<td>
    <a href='#' 
       class='btnEditarMedico' 
       data-id='" . $fila->MedIdentificacion . "' 
       data-nombres='" . htmlspecialchars($fila->MedNombres, ENT_QUOTES) . "' 
       data-apellidos='" . htmlspecialchars($fila->MedApellidos, ENT_QUOTES) . "'>
       Editar
    </a>
</td>";
                    echo "<td>
    <a href='#' 
       class='btnEliminarMedico' 
       data-id='" . $fila->MedIdentificacion . "'>
       Eliminar
    </a>
</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No hay médicos registrados.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>