<?php
class Registro
{
    public function registrarUsuario($correo, $contrasena, $rol)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        // Encriptar la contraseña
        $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (correo, contrasena, rol) VALUES ('$correo', '$contrasenaHash', '$rol')";
        $conexion->consulta($sql);
        $id_usuario = $conexion->obtenerCitaId();
        $conexion->cerrar();
        return $id_usuario ? $id_usuario : false;
    }

    public function registrarPaciente($identificacion, $nombres, $apellidos, $fechaNacimiento, $sexo, $correo, $id_usuario)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "INSERT INTO pacientes (PacIdentificacion, PacNombres, PacApellidos, PacFechaNacimiento, PacSexo, correo, id_usuario) VALUES (
            '$identificacion','$nombres','$apellidos','$fechaNacimiento','$sexo','$correo','$id_usuario')";
        $conexion->consulta($sql);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }

    public function verificarLogin($correo, $contrasena, $rol)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND rol = '$rol'";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $usuario = $result ? $result->fetch_assoc() : null;
        $conexion->cerrar();

        if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
            return $usuario; // Devuelve los datos del usuario si es correcto
        } else {
            return false;
        }
    }
}
?>