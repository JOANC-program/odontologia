<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Gestión Odontológica</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
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
            <a href="index.php?accion=agregarMedico" class="boton">Agregar Médico</a>
            <?php
            if (isset($result) && $result->num_rows > 0) {
                echo "<table border='1'>";
                echo "<tr><th>Identificación</th><th>Nombres</th><th>Apellidos</th><th>Accion1</th><th>Accion2</th></tr>";
                while ($fila = $result->fetch_object()) {
                    echo "<tr>";
                    echo "<td>" . $fila->MedIdentificacion . "</td>";
                    echo "<td>" . $fila->MedNombres . "</td>";
                    echo "<td>" . $fila->MedApellidos . "</td>";
                    echo "<td><a href='index.php?accion=editarMedico&id=" . $fila->MedIdentificacion . "'>Editar</a></td>";
                     echo "<td><a href='index.php?accion=eliminarMedico&id=" . $fila->MedIdentificacion . "'>Eliminar</a></td>";
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