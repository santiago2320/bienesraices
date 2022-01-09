<?php


namespace Model;

class Vendedor extends ActiveRecord {

     protected static $tabla = 'vendedores';
     protected static $columnasDB = ['id','nombre','apellido','telefono'];

     public $id;
     public $nombre;
     public $apellido;
     public $telefono;

     public function __construct($args = [])
     {
         $this->id = $args['id'] ?? null;
         $this->nombre = $args['nombre'] ?? '';
         $this->apellido = $args['apellido'] ?? '';
         $this->telefono = $args['telefono'] ?? '';
     }

     public function validar(){
        

        if(!$this->nombre){
            self::$errores[] = "El Nombre es obligatario";
        }
        if(!$this->nombre){
            self::$errores[] = "El Apellido es obligatario";
        }
        if(!$this->telefono){
            self::$errores[] = "El Telefono es obligatario";
        }
        if(!preg_match('/[0-9]{8}/',$this->telefono)){
            self::$errores[] = "Formato no valido";
        }
        return self::$errores;
    }

}