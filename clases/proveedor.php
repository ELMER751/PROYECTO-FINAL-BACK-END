<?php

class  Proveedor {
        
		private $idProveedor;
		private $nombreProveedor;
		private $rucProveedor;
		private $dirProveedor;
		private $telProveedor;
        private $emailProveedor;
        private $fecharegistro;
        private $con;
		
		public function conectar_db($cn){
			$this->con = $cn;

		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listaproveedor(){
			$sql = "SELECT * FROM proveedores";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM proveedores where idProveedor=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}
		
		public function agrega_proveedor($nom,$dir,$ruc,$email,$tel,$fechare){
			$sql = "insert into proveedores(nombre_proveedor,direccion_proveedor,ruc_proveedor,email_proveedor,telefono_proveedor,fecha_registro_proveedor) values ('$nom','$dir','$ruc','$email','$tel','$fechare')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
		public function modifica_proveedor($id,$nom,$dir,$ruc,$email,$tel,$fechare){
            $id = intval($id);
			$sql = "update proveedores set
			nombre_proveedor='$nom',
			direccion_proveedor='$dir', 
            ruc_proveedor=$ruc,
			email_proveedor='$email',
            telefono_proveedor=$tel,
            fecha_registro_proveedor='$fechare' 
			where idProveedor= $id ";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar($id){
			$sql = "DELETE FROM proveedores WHERE idProveedor=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
       
        public function set_idProveedor($id){
            $this->idProveedor = $id;
        }
    
        public function set_nombreProveedor($nom){
            $this->nombreProveedor = $nom;
        }
    
        public function set_rucProveedor($ruc){
            $this->rucProveedor = $ruc;
        }
    
        public function set_dirProveedor($dir){
            $this->dirProveedor = $dir;
        }
    
        public function set_telProveedor($tel){
            $this->telProveedor = $tel;
        }
    
        public function set_emailProveedor($email){
            $this->emailProveedor = $email;
        }
    
        public function set_fecharegistro($fechare){
            $this->fecharegistro = $fechare;
        }
    
        public function get_idProveedor(){
            return $this->idProveedor;
        }
    
        public function get_nombreProveedor(){
            return $this->nombreProveedor;
        }
    
        public function get_rucProveedor(){
            return $this->rucProveedor;
        }
    
        public function get_dirProveedor(){
            return $this->dirProveedor;
        }
    
        public function get_telProveedor(){
            return $this->telProveedor;
        }
    
        public function get_emailProveedor(){
            return $this->emailProveedor;
        }
    
        public function get_fecharegistro(){
            return $this->fecharegistro;
        }
	}
?>	