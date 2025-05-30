<!DOCTYPE html>
<html>

<head>
    <title>Consultar Cita</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
    <link href="Vista/jquery/jquery-ui-1.14.1/jquery-ui.css" rel="stylesheet" type="text/css">
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
            <li><a href="index.php?accion=paciente">Inicio</a></li>
            <li class="activa"><a href="index.php?accion=consultar_paciente">Mis Citas</a></li>
            <li><a href="index.php?accion=cancelar_paciente">Cancelar Cita</a></li>
            <li><a href="index.php?accion=asignar_paciente">Agendar Cita</a> </li>
        </ul>
        <div id="contenido">
            <h2>Mis Citas</h2>
            <?php if (isset($result) && $result->num_rows > 0): ?>
                <table border="1">
                    <tr>
                        <th>Número</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Médico</th>
                        <th>Consultorio</th>
                        <th>Estado</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                    <?php while ($cita = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cita['CitNumero']); ?></td>
                            <td><?php echo htmlspecialchars($cita['CitFecha']); ?></td>
                            <td><?php echo htmlspecialchars($cita['CitHora']); ?></td>
                            <td><?php echo htmlspecialchars($cita['CitMedico']); ?></td>
                            <td><?php echo htmlspecialchars($cita['CitConsultorio']); ?></td>
                            <td><?php echo htmlspecialchars($cita['CitEstado']); ?></td>
                            <td><?php echo htmlspecialchars($cita['citObservaciones']); ?></td>
                            <td>
                                <a href="index.php?accion=detalles_cita_paciente&numero=<?php echo $cita['CitNumero']; ?>">Ver</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p>No tienes citas registradas.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>