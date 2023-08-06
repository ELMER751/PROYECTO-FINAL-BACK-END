<?php

class Empleados {
        
	private $idEmpleado;
	private $nombre;
	private $telefono;
	private $con;

	public function conectar_db($cn){
		$this->con = $cn;
	}

	public function sanitize($var) {
		$valor = mysqli_real_escape_string($this->con, $var);
		return $valor;
	}
	
	public function listarEmpleados(){
		$sql = "SELECT idEmpleado, nombre, telefono FROM empleados";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function consultarEmpleado($id){
		$sql = "SELECT idEmpleado, nombre, telefono FROM empleados WHERE idEmpleado = $id";
		$res = mysqli_query($this->con, $sql);
		$return = mysqli_fetch_array($res);
		return $return;
	}
	
	public function agregarEmpleado($nombre, $telefono) {
		$nombre = $this->sanitize($nombre);
		$telefono = $this->sanitize($telefono);
		$sql = "INSERT INTO empleados (nombre, telefono) VALUES ('$nombre', '$telefono')";
		$res = mysqli_query($this->con, $sql);
		if ($res) {
			return true;
		} else {
			echo mysqli_error($this->con); // Imprime cualquier error de la consulta
			return false;
		}
	}
	
	public function modificarEmpleado($id, $nombre, $telefono){
		$sql = "UPDATE empleados SET nombre = '$nombre', telefono = '$telefono' WHERE idEmpleado = $id";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}	
	
	public function borrarEmpleado($id){
		$sql = "DELETE FROM empleados WHERE idEmpleado = $id";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}
	
	public function set_idEmpleado($id){
		$this->idEmpleado = $id;
	}
	
	public function set_nombre($nombre){
		$this->nombre = $nombre;
	}
	
	public function set_telefono($telefono){
		$this->telefono = $telefono;
	}
	
	public function get_idEmpleado(){
		return $this->idEmpleado;
	}
	
	public function get_nombre(){
		return $this->nombre;
	}
	
	public function get_telefono(){
		return $this->telefono;
	}

}
	
?>
