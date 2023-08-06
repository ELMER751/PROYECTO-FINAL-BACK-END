<?php
class Linea {
    private $idLinea;
    private $nombre;
    private $db;

    public function conectar_db($conexion) {
        $this->db = $conexion;
    }

    public function listalinea(){
        $consulta = "SELECT * FROM lineas";
        $result = mysqli_query($this->db, $consulta);
        return $result;
    }

    public function agregarlinea($nombre){
        $consulta = "INSERT INTO lineas (nombre) VALUES ('$nombre')";
        $result = mysqli_query($this->db, $consulta);
        return $result;
    }
    
    public function eliminarlinea($idLinea) {
        $consulta = "DELETE FROM lineas WHERE idLinea = '$idLinea'";
        $result = mysqli_query($this->db, $consulta);
        return $result;
    }
    
    public function modificarlinea($idLinea, $nombre) {
        $consulta = "UPDATE lineas SET nombre = '$nombre' WHERE idLinea = '$idLinea'";
        $result = mysqli_query($this->db, $consulta);
        return $result;
    }
    
    public function obtenerlinea($idLinea) {
        $consulta = "SELECT * FROM lineas WHERE idLinea = '$idLinea'";
        $result = mysqli_query($this->db, $consulta);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
}

?>

