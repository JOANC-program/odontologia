<?php
class Medico{
    public function consultarMedicos1()
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT * FROM Medicos ";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
    }
    public function agregarMedico($id, $nombres, $apellidos, $correo)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "INSERT INTO Medicos (MedIdentificacion, MedNombres, MedApellidos, correo) VALUES ('$id', '$nombres', '$apellidos', '$correo')";
        $conexion->consulta($sql);
        $conexion->cerrar();
    }
    public function consultarMedicoPorId($id)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT * FROM Medicos WHERE MedIdentificacion = '$id'";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
    }
    public function actualizarMedico($id, $nombres, $apellidos)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "UPDATE Medicos SET MedNombres='$nombres', MedApellidos='$apellidos' WHERE MedIdentificacion='$id'";
        $conexion->consulta($sql);
        $conexion->cerrar();
    }
     public function eliminarMedico($id)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "DELETE  FROM Medicos WHERE MedIdentificacion='$id'";
        $conexion->consulta($sql);
        $conexion->cerrar();
    }
}
?>