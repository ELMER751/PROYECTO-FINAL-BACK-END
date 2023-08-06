<?php

// Define la clase Producto con sus métodos y propiedades
class Registro_Ventas {
    
    // Propiedades privadas de la clase
    private $idVenta;
    private $vendedor;
    private $documento;
    private $nor_venta;
    private $cliente;
    private $tipo_venta;
    private $fecha;
    private $con;


    // Método para establecer la conexión a la base de datos
    public function conectar_db($cn){
        $this->con = $cn;
    }

    // Método para limpiar y evitar inyecciones SQL en los datos ingresados
    public function sanitize($var) {
        $valor = mysqli_real_escape_string($this->con, $var);
        return $valor;
    }
    
    // Método para obtener la lista de productos desde la base de datos
    public function lista_registros(){
        $sql = "SELECT * FROM registro_ventas";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    // Método para obtener la información de un producto específico desde la base de datos
    public function consulta($id){
        $sql = "SELECT * FROM registro_ventas where idVenta=$id";
        $res = mysqli_query($this->con, $sql);
        $return = mysqli_fetch_array($res);
        return $return;
    }
    
    // Método para agregar un nuevo producto a la base de datos
    public function agrega_registro($nom,$und,$can,$pre,$cos,$sas){
        $sql = "INSERT INTO registro_ventas(vendedor,documento,nro_venta,cliente,tipo_venta,fecha) VALUES ('$nom','$und','$can','$pre','$cos','$sas')";
        
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }   
    
    // Método para modificar la información de un producto en la base de datos
    public function modifica_registro($id,$nom,$und,$can,$pre,$cos,$sas){
        $sql = "UPDATE registro_ventas SET
        vendedor='$nom',
        documento='$und',
        nro_venta=$can, 
        cliente='$pre',
        tipo_venta='$cos',
        fecha='$sas'
        WHERE idProducto='$id'";
        
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }   
        
    // Método para eliminar un producto de la base de datos
    public function borrar($id){
        $sql = "DELETE FROM registro_ventas WHERE idVenta=$id";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    
    // Métodos para establecer y obtener los valores de las propiedades
    public function set_idVenta($id){
        $this->idVenta = $id;
    }

    // Método set para vendedor
    public function set_vendedor($nom){
        $this->vendedor = $nom;
    }

    // Método set para documento
    public function set_documento($und){
        $this->documento = $und;
    }

    // Método set para nor_venta
    public function set_nor_venta($can){
        $this->nor_venta = $can;
    }

    // Método set para cliente
    public function set_cliente($pre){
        $this->cliente = $pre;
    }

    // Método set para tipo_venta
    public function set_tipo_venta($cos){
        $this->tipo_venta = $cos;
    }

    // Método set para fecha
    public function set_fecha($sas){
        $this->fecha = $sas;
    }

    // Método get para idVenta
    public function get_idVenta(){
        return $this->idVenta;
    }

    // Método get para vendedor
    public function get_vendedor(){
        return $this->vendedor;
    }

    // Método get para documento
    public function get_documento(){
        return $this->documento;
    }

    // Método get para nor_venta
    public function get_nor_venta(){
        return $this->nor_venta;
    }

    // Método get para cliente
    public function get_cliente(){
        return $this->cliente;
    }

    // Método get para tipo_venta
    public function get_tipo_venta(){
        return $this->tipo_venta;
    }

    // Método get para fecha
    public function get_fecha(){
        return $this->fecha;
    }

}