<?php

namespace Model;

class ActiveRecord{
     // Base de datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    // Errores
    protected static $errores = [];
     
     // Defenir la conexion a la bade de datos
    public static function setDB($database){
        self::$db = $database;
    }

     public function Guardar(){
        if(!is_null($this->id)){
           // actualizar
           $this->Actualizar();
        }else{
            // crear nuevo registro
            $this->Crear();
        }
     }

     public function Crear(){

        // Sanatizar los datos // evitar inyyeccion sql
        $atributos = $this->sanatizarAtributos();

        // $string = join(', ', array_values($atributos));
        // debuguear($string);

      

        $query = " INSERT INTO ". static::$tabla . "( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";
        
        $resultado = self::$db->query($query);

        if($resultado){
            // Redireccionar al usuario
            header('location: /admin?resultado=1');
        }
    }

    public function Actualizar(){
        $atributos = $this->sanatizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] = "{$key}= '{$value}'";
        }
        
        $query = "UPDATE " . static::$tabla  . " SET ";
        $query .= join(', ', $valores);
        $query .= "WHERE id = '". self::$db->escape_string($this->id) . "' ";
        $query .= "LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado){
            // Redireccionar al usuario
            header('location: /admin?resultado=2');
        }

        
    }

    // Eliminar Registro
    public function eliminar(){
        // Eliminar el Registro
        $query = "DELETE FROM ". static::$tabla   . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado){
            $this->deleteImagen();
            header('location: /admin?resultado=3');
        }
    }

    // Identificar y unir los atributos de la BD
    public function atributos (){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this-> $columna;
        }
        return $atributos;
    }

    public function sanatizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value){
           $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }
    // Subida de archivos 
    public function setImagen($imagen){
        // Elimina la imagen previa.
        if(!is_null($this->id)){
           $this->deleteImagen();
        };
        // Asignar al atributo de la imagen el nombre de la imagen.
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    // Eliminar el Archivo
    public function deleteImagen(){
        $existfile = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existfile){
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    // Validacion
    public static function getErrores(){
        return static::$errores;
    }

    public function validar(){
        static::$errores = [];
        return static::$errores;
    }

    // Lista todas las Propiedades
    public static function all() {
      $query = "SELECT * FROM " . static::$tabla;

      $resultado = self::consultarSQL($query);       
      return $resultado;
      
    }

    // Obtiene determinado numero de registros 
    public static function get($cantidad) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
  
        $resultado = self::consultarSQL($query);
        return $resultado;
        
      }

    // // busca registro por id
    public static function find($id){
        $query = "SELECT * FROM ". static::$tabla ." WHERE id = ${id}";

        $resultado = self::consultarSQL($query);
        
        return array_shift($resultado);

    }

    public static function consultarSQL($query){
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
       $array = [];
       while ($registro = $resultado->fetch_assoc()) {
           $array[] = static::crearObjeto($registro);
        
       }
        // Liberar la memoria
        $resultado->free();

        // Retornar los resultados
        return $array;
       
    }

    protected static function crearObjeto($registro){
        $objeto = new static;

        foreach($registro as $key => $value) {
            if(property_exists( $objeto, $key )) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Sincroniza el objeto en memoria con los cambios realizados por el usuario.
    public function sincronizar ( $args = []){
        foreach($args as $key => $value){
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}