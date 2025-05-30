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
    public function agregarMedico($id, $nombres, $apellidos, $correo, $id_usuario)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "INSERT INTO Medicos (MedIdentificacion, MedNombres, MedApellidos, correo, id_usuario) 
                VALUES ('$id', '$nombres', '$apellidos', '$correo', '$id_usuario')";
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
    public function consultarMedicoPorUsuario($id_usuario)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT MedIdentificacion FROM Medicos WHERE id_usuario = " . intval($id_usuario);
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
    }
}
?>