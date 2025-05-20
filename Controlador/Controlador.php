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
    public function guardarMedico($id, $nombres, $apellidos)
    {
        $Medico = new Medico();
        $Medico->agregarMedico($id, $nombres, $apellidos);
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
}
