<?php
// Assuming you have already established a database connection and assigned it to the variable $con.
class Registro {
    private $idUsuario;
    private $contraseña;
    private $usuario;
    private $con;
    public function conectar_db($cn){
        $this->con = $cn;

    }

    public function sanitize($var) {
        $valor = mysqli_real_escape_string($this->con, $var);
        return $valor;
    }
    
    public function listaprodu(){
        $sql = "SELECT * FROM login";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function consulta($id){
        $sql = "SELECT * FROM login where id=$id";
        $res = mysqli_query($this->con, $sql);
        $return = mysqli_fetch_array($res);
        return $return ;
    }
    public function registrar_usuario($nom, $pas) {
        $sql = "insert into login (usario, contraseña) values ('$nom', '$pas')";
        $res = mysqli_query($this->con, $sql);

        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    public function borrar($id){
		$sql = "DELETE FROM login WHERE id = $id";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

public function set_id($id){
    $this->idUsuario = $id;
}
public function set_usuario($nom){
    $this->usuario = $nom;
}
public function set_contraseña($pas){
    $this->contraseña = $pas;
}

public function get_idproducto(){
    return $this->idUsuario;
}
public function get_nomproducto(){
    return $this->usuario;
}
public function get_unimed(){
    return $this->contraseña;
}

}


?>