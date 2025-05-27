<?php
require_once 'Controlador/Controlador.php';
require_once 'Modelo/GestorCita.php';
require_once 'Modelo/Cita.php';
require_once 'Modelo/Paciente.php';
require_once 'Modelo/Conexion.php';
require_once 'Modelo/Medico.php';
require_once 'Modelo/Registro.php';
$controlador = new Controlador();
if (isset($_GET["accion"])) {
    if ($_GET["accion"] == "asignar") {
        $controlador->cargarAsignar();
    }elseif ($_GET["accion"] == "consultar") {
        $controlador->verPagina('Vista/html/consultar.php');
    } elseif ($_GET["accion"] == "cancelar") {
        $controlador->verPagina('Vista/html/cancelar.php');
    } elseif ($_GET["accion"] == "medicos") {
        $controlador->mostrarMedicos();
    } elseif ($_GET["accion"] == "inicio") {
        $controlador->mostrarinicio();
    }elseif ($_GET["accion"] == "paciente") {
        $controlador->verPagina('Vista/html/paciente.php');
    }
    elseif ($_GET["accion"] == "guardarCita") {
        $controlador->agregarCita(
            $_POST["asignarDocumento"],

            $_POST["medico"],
            $_POST["fecha"],
            $_POST["hora"],
            $_POST["consultorio"]
        );
    } elseif ($_GET["accion"] == "consultarCita") {
        $controlador->consultarCitas($_GET["consultarDocumento"]);
    } elseif ($_GET["accion"] == "cancelarCita") {
        $controlador->cancelarCitas($_GET["cancelarDocumento"]);
    } elseif ($_GET["accion"] == "ConsultarPaciente") {
        $controlador->consultarPaciente($_GET["documento"]);
    } elseif ($_GET["accion"] == "ingresarPaciente") {
        $controlador->agregarPaciente(
            $_GET["PacDocumento"],
            $_GET["PacNombres"],
            $_GET["PacApellidos"],
            $_GET["PacNacimiento"],
            $_GET["PacSexo"]
        );
    } elseif ($_GET["accion"] == "consultarHora") {
        $controlador->consultarHorasDisponibles($_GET["medico"], $_GET["fecha"]);
    } elseif ($_GET["accion"] == "verCita") {
        $controlador->verCita($_GET["numero"]);
    } elseif ($_GET["accion"] == "confirmarCancelar") {
        $controlador->confirmarCancelarCita($_GET["numero"]);
    } elseif ($_GET["accion"] == "agregarMedico") {
        require_once 'Vista/html/agregarMedicos.php';
    } elseif ($_GET["accion"] == "guardarMedico") {
        $controlador->guardarMedico(
            $_POST["MedIdentificacion"],
            $_POST["MedNombres"],
            $_POST["MedApellidos"]
        );
    } elseif ($_GET["accion"] == "editarMedico") {
        if (isset($_GET["id"])) {
            $controlador->editarMedico($_GET["id"]);
        } else {
            echo "Error: Falta el parámetro id para editar médico.";
        }
    } elseif ($_GET["accion"] == "guardarEdicionMedico") {
        $controlador->guardarEdicionMedico(
            $_POST["MedIdentificacion"],
            $_POST["MedNombres"],
            $_POST["MedApellidos"]
        );
    } elseif ($_GET["accion"] == "eliminarMedico") {
        if (isset($_GET["id"])) {
            $controlador->eliminarMedico($_GET["id"]);
        } else {
            echo "Error: Falta el parámetro id para editar médico.";
        }
    } elseif ($_GET["accion"] == "guardarEliminacionMedico") {
        $controlador->guardarEliminacionMedico(
            $_POST["MedIdentificacion"]
        );
    } elseif ($_GET["accion"] == "registrarUsuario") {
        $correo = $_POST["correo"];
        $contrasena = $_POST["contrasena"];
        $rol = $_POST["rol"]; // "paciente"
        $PacIdentificacion = $_POST["PacIdentificacion"];
        $PacNombres = $_POST["PacNombres"];
        $PacApellidos = $_POST["PacApellidos"];
        $PacFechaNacimiento = $_POST["PacFechaNacimiento"];
        $PacSexo = $_POST["PacSexo"];

        $controlador->registrarUsuarioPaciente(
            $correo,
            $contrasena,
            $rol,
            $PacIdentificacion,
            $PacNombres,
            $PacApellidos,
            $PacFechaNacimiento,
            $PacSexo
        );
    } elseif ($_GET["accion"] == "registro") {
        $controlador->verPagina('Vista/html/registro.php');
    }
    elseif ($_GET["accion"] == "login") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasenalogin"];
        $rol = $_POST["rollogin"];
        $controlador->Login($usuario, $contrasena, $rol);
    } elseif ($_GET["accion"] == "cerrarSesion") {
        session_start();
        session_destroy();
        header("Location: index.php");
        exit;
    }
} else {
    $controlador->verPagina('Vista/html/iniciologin.php');
}