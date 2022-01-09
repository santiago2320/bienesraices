<?php

function conectarDB() : mysqli{ // retorna mysqli base de datos
     $db = new mysqli('localhost','root','','bienes_raices');
     

     if(!$db){
          echo "error no se pudo conectar ";
          exit;
     }
     return $db;

}