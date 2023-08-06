<?php

class documentos {
        
	private $idDocumento;
	private $nombre;
	private $con;

	public function conectar_db($cn){
		$this->con = $cn;
	}

	public function sanitize($var) {
		$valor = mysqli_real_escape_string($this->con, $var);
		return $valor;
	}
	
	public function listarDocumentos(){
		$sql = "SELECT idDocumento, nombre FROM documentos";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function consultarDocumento($id){
		$sql = "SELECT idDocumento, nombre FROM documentos WHERE idDocumento = $id";
		$res = mysqli_query($this->con, $sql);
		$return = mysqli_fetch_array($res);
		return $return;
	}
	
	public function agregarDocumento($nombre) {
		$nombre = $this->sanitize($nombre);
		$sql = "INSERT INTO documentos (nombre) VALUES ('$nombre')";
		$res = mysqli_query($this->con, $sql);
		if ($res) {
			return true;
		} else {
			echo mysqli_error($this->con); // Imprime cualquier error de la consulta
			return false;
		}
	}
	
	
	public function modificarDocumento($id, $nombre){
		$sql = "UPDATE documentos SET nombre = '$nombre' WHERE idDocumento = $id";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}	
	
	public function borrarDocumento($id){
		$sql = "DELETE FROM documentos WHERE idDocumento = $id";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}
	
	public function set_idDocumento($id){
		$this->idDocumento = $id;
	}
	
	public function set_nombre($nombre){
		$this->nombre = $nombre;
	}
	
	public function get_idDocumento(){
		return $this->idDocumento;
	}
	
	public function get_nombre(){
		return $this->nombre;
	}

}
	
?>	
