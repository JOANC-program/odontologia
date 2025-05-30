<?php
class Controlador
{
    public function verPagina($ruta)
    {
        require_once $ruta;
    }
    public function agregarCita($doc, $med, $fec, $hor, $con)
    {
        $cita = new Cita(
            null,
            $fec,
            $hor,
            $doc,
            $med,
            $con,
            "Solicitada",
            "Ninguna"
        );
        $gestorCita = new GestorCita();
        $id = $gestorCita->agregarCita($cita);
        $result = $gestorCita->consultarCitaPorId($id);
        require_once 'Vista/html/confirmarCita.php';
    }
    public function consultarCitas($doc)
    {
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarCitasPorDocumento($doc);
        require_once 'Vista/html/consultarCitas.php';
    }
    public function cancelarCitas($doc)
    {
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarCitasPorDocumento($doc);
        require_once 'Vista/html/cancelarCitas.php';
    }
    public function consultarPaciente($doc)
    {
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarPaciente($doc);
        require_once 'Vista/html/consultarPaciente.php';
    }
    public function agregarPaciente($doc, $nom, $ape, $fec, $sex)
    {
        $paciente = new Paciente($doc, $nom, $ape, $fec, $sex);
        $gestorCita = new GestorCita();
        $registros = $gestorCita->agregarPaciente($paciente);
        if ($registros > 0) {
            echo "Se insertó el paciente con exito";
        } else {
            echo "Error al grabar el paciente";
        }
    }
    public function cargarAsignar()
    {
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarMedicos();
        $result2 = $gestorCita->consultarConsultorios();
        require_once 'Vista/html/asignar.php';
    }
    public function consultarHorasDisponibles($medico, $fecha)
    {
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarHorasDisponibles(
            $medico,
            $fecha
        );
        require_once 'Vista/html/consultarHoras.php';
    }
    public function verCita($cita)
    {
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarCitaPorId($cita);
        require_once 'Vista/html/confirmarCita.php';
    }
    public function confirmarCancelarCita($cita)
    {
        $gestorCita = new GestorCita();
        $registros = $gestorCita->cancelarCita($cita);
        if ($registros > 0) {
            echo "La cita se ha cancelado con éxito";
        } else {
            echo "Hubo un error al cancelar la cita";
        }
    }
    public function mostrarMedicos()
    {
        $Medico = new Medico();
        $result = $Medico->consultarMedicos1();
        require_once 'Vista/html/gestorMedicos.php';
    }
    public function mostrarinicio()
    {
        require_once 'Vista/html/inicio.php';
    }
    public function guardarMedico($id, $nombres, $apellidos, $correo)
    {
        require_once 'Modelo/Registro.php';
        $Medico = new Medico();
        $registro = new Registro();

        // 1. Registrar usuario y obtener el id
        $rol = 'medico';
        $id_usuario = $registro->registrarUsuario($correo, $id, $rol);

        // 2. Guardar en la tabla medicos incluyendo el id_usuario
        $Medico->agregarMedico($id, $nombres, $apellidos, $correo, $id_usuario);

        header("Location: index.php?accion=medicos");
        exit;
    }
    public function editarMedico($id)
    {
        $Medico = new Medico();
        $result = $Medico->consultarMedicoPorId($id);
        require_once 'Vista/html/editarMedicos.php';
    }

    public function guardarEdicionMedico($id, $nombres, $apellidos)
    {
        $Medico = new Medico();
        $Medico->actualizarMedico($id, $nombres, $apellidos);
        header("Location: index.php?accion=medicos");
        exit;
    }
    public function eliminarMedico($id)
    {
        $Medico = new Medico();
        $result = $Medico->consultarMedicoPorId($id);
        require_once 'Vista/html/eliminarMedicos.php';
    }
    public function guardarEliminacionMedico($id)
    {
        $Medico = new Medico();
        $Medico->eliminarMedico($id);
        header("Location: index.php?accion=medicos");
        exit;
    }
    public function registrarUsuarioPaciente($correo, $contrasena, $rol, $identificacion, $nombres, $apellidos, $fechaNacimiento, $sexo)
    {
        require_once 'Modelo/Registro.php';
        $registro = new Registro();

        // 1. Guardar en usuarios
        $id_usuario = $registro->registrarUsuario($correo, $contrasena, $rol);

        // 2. Guardar en pacientes solo si el usuario se creó correctamente
        if ($id_usuario) {
            $ok = $registro->registrarPaciente($identificacion, $nombres, $apellidos, $fechaNacimiento, $sexo, $correo, $id_usuario);
            if ($ok) {
                echo "<script>alert('Registro exitoso. Ahora puede iniciar sesión.');window.location='index.php?accion=inicio';</script>";
            } else {
                echo "<script>alert('Error al registrar paciente.');window.location='index.php?accion=registro';</script>";
            }
        } else {
            echo "<script>alert('Error al registrar usuario.');window.location='index.php?accion=registro';</script>";
        }
    }
    public function Login($correo, $contrasena, $rol)
    {
        require_once 'Modelo/Registro.php';
        session_start();
        $registro = new Registro();
        $usuario = $registro->verificarLogin($correo, $contrasena, $rol);

        if ($usuario) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['correo'] = $usuario['correo'];
            $_SESSION['rol'] = $usuario['rol'];

            // Redirigir según el rol
            if ($usuario['rol'] === 'admin') {
                header('Location: Vista/html/admin.php');
            } elseif ($usuario['rol'] === 'medico') {
                // Obtener la identificación del médico por el id_usuario
                $Medico = new Medico();
                $result = $Medico->consultarMedicoPorUsuario($usuario['id']);
                if ($row = $result->fetch_assoc()) {
                    $_SESSION['identificacion_medico'] = $row['MedIdentificacion'];
                }
                header('Location: index.php?accion=vistamedico');
            } elseif ($usuario['rol'] === 'paciente') {
                $doc = $registro->obtenerDocumentoPacientePorUsuario($usuario['id']);
                if ($doc) {
                    $_SESSION['documento_paciente'] = $doc;
                }
                header('Location: index.php?accion=paciente');
            }
            exit;
        } else {
            echo "<script>alert('Credenciales incorrectas.');window.location='index.php';</script>";
        }
    }
    public function verCitasPacienteLogueado()
    {
        session_start();
        if (isset($_SESSION['documento_paciente'])) {
            $doc = $_SESSION['documento_paciente'];
            $gestorCita = new GestorCita();
            $result = $gestorCita->consultarCitasPorDocumento($doc);
            require_once 'Vista/html/consultar_paciente.php';
        } else {
            echo "<script>alert('No hay paciente logueado.');window.location='index.php';</script>";
        }
    }
    public function detalles_cita_paciente($numero)
    {
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarCitaPorId($numero);
        require_once 'Vista/html/detalles_paciente.php';
    }
    public function cancelarCitaPaciente($numero)
    {
        $gestorCita = new GestorCita();
        $registros = $gestorCita->cancelarCita($numero);
        if ($registros > 0) {
            echo "<script>alert('La cita se ha cancelado con éxito');window.location='index.php?accion=cancelar_paciente';</script>";
        } else {
            echo "<script>alert('Hubo un error al cancelar la cita');window.location='index.php?accion=cancelar_paciente';</script>";
        }
    }
    public function verCitasPacienteParaCancelar()
    {
        session_start();
        if (isset($_SESSION['documento_paciente'])) {
            $doc = $_SESSION['documento_paciente'];
            $gestorCita = new GestorCita();
            $result = $gestorCita->consultarCitasPorDocumento($doc);
            require_once 'Vista/html/cancelar_paciente.php';
        } else {
            echo "<script>alert('No hay paciente logueado.');window.location='index.php';</script>";
        }
    }
    public function verCitasMedicoLogueado()
    {
        session_start();
        if (isset($_SESSION['identificacion_medico'])) {
            $medicoId = $_SESSION['identificacion_medico'];
            $gestorCita = new GestorCita();
            $result = $gestorCita->consultarCitasPorMedico($medicoId);
            require_once 'Vista/html/consultar_medico.php';
        } else {
            echo "<script>alert('No hay médico logueado.');window.location='index.php';</script>";
        }
    }
}
