<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


class propiedadController{

     public static function index (Router $router){
          $propiedades = propiedad::all();

          $vendedores = Vendedor::all();
          
          // muestra mensaje condicional atravez de la url
          $resultado = $_GET['resultado'] ?? null;

          $router->render('propiedades/admin',[
               'propiedades' => $propiedades,
               'resultado' => $resultado,
               'vendedores' => $vendedores
          ]);
     }
     public static function crear (Router $router){

          $propiedad = new propiedad();
          $vendedores = Vendedor::all();
           //arreglo con mensajes de errores
          $errores = propiedad::getErrores();

          // Verifica si el metodo es POST
          if($_SERVER['REQUEST_METHOD'] === 'POST'){

               /* Crea una nuenva Instancia */
               $propiedad = new propiedad($_POST['propiedad']);
               /**  SUBIDA DE ARCHIVOS */
               //Generar un nombre unico en la imagen
               $nombreImagen = md5( uniqid(rand(), true) ) . ".jpg";
          
               // setea la imagen
               // Realiza un resize a la imagen con intervention
               if($_FILES['propiedad']['tmp_name']['imagen']){
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    $propiedad->setImagen($nombreImagen);
               };

               // Validar
               $errores = $propiedad->validar();
               //Revisar que el array este vacio
               if(empty($errores)){
                    // Crear la carpeta para subir imagenes
                    if(!is_dir(CARPETA_IMAGENES)){
                         mkdir(CARPETA_IMAGENES);
                    }
                    // Guarda la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                    // Guarda la imagen en la base de datos.
                     $propiedad->Guardar();    
               }
          }

          $router->render('propiedades/crear',[
               'propiedad'=> $propiedad,
               'vendedores' => $vendedores,
               'errores'=> $errores
          ]);
         
     }
     public static function Actualizar(Router $router){
          
          $id = validarORedireccionar('/admin');
          $propiedad =  Propiedad::find($id);

          $vendedores = Vendedor::all();

          $errores = Propiedad::getErrores();

          // Metodo Post para actualizar 
          if($_SERVER['REQUEST_METHOD'] === 'POST'){

               // Asignar los atributos.
               $args = $_POST['propiedad'];
          
               $propiedad->sincronizar($args);
               
               // Validacion
               $errores = $propiedad->validar();
               // Genera un nombre unico
               $nombreImagen = md5( uniqid(rand(), true) ) . ".jpg";
               // Subida de archivos
               if($_FILES['propiedad']['tmp_name']['imagen']){
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    $propiedad->setImagen($nombreImagen);
               };
               //Revisar que el array este vacio
               if(empty($errores)){
               // Almacenar la imagen
               if($_FILES['propiedad']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
               }
          
                $propiedad->guardar(); 
                
               }
          }

          // Muestra en la vista. 
          $router->render('/propiedades/actualizar',[
               'propiedad' => $propiedad,
               'errores' => $errores,
               'vendedores'  => $vendedores
          ]);
     }


     public static function eliminar (){
          if($_SERVER["REQUEST_METHOD"]=== 'POST'){

               // Validar Id
               $id = $_POST['id'];
               $id = filter_var($id,FILTER_VALIDATE_INT);
     
               if($id){
     
                    $tipo = $_POST['tipo'];
     
                    if(validarTipodecontenido($tipo)){
                         $propiedad = propiedad::find($id);
                         $propiedad->eliminar(); 
                    }              
               }   
          }
     }

     
}