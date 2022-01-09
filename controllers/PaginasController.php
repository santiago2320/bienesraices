<?php

namespace Controllers;

use MVC\Router;
use Model\propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class paginasController {
     public static function index(Router $router){

          $propiedades = propiedad::get(3);
          $inicio = true;
          
          $router->render('paginas/index',[
               'propiedades' => $propiedades,
               'inicio' => $inicio
          ]);

     }
     public static function nosotros(Router $router){
          
          $router->render('paginas/nosotros');

     }
     public static function propiedades(Router $router){
          
          $propiedades = propiedad::all();

          $router->render('paginas/propiedades',[
               'propiedades' => $propiedades
          ]);

     }
     public static function propiedad(Router $router){
          
          $id = validarORedireccionar('/propiedades');

          // Buscar la propiedad por su id
          $propiedad = propiedad::find($id);

          $router->render('paginas/propiedad',[

               'propiedad' => $propiedad

          ]);

     }
     public static function blog(Router $router){
          
          $router->render('paginas/blog');

     }
     public static function entrada(Router $router){

          $router->render('paginas/entrada');

     }
     public static function contacto(Router $router){

          $mensaje = null;

          if($_SERVER['REQUEST_METHOD'] === 'POST'){
               
               $respuestas = $_POST['contacto'];

               //Crear una instancia de PHPMailer
               $mail = new PHPMailer();

               //Configurar SMTP: es el protocolo que se utliza para el envio de mails
               $mail->isSMTP();
               $mail->Host = 'smtp.mailtrap.io';
               $mail->SMTPAuth = true;
               $mail->Username = '72a9a34f9be635';
               $mail->Password= '4aa76a2e058d37';
               $mail->SMTPSecure= 'tls'; // seguridad del mail
               $mail->Port = 2525;

               //configurar el contenido del mail.
               $mail->setFrom('admin@bienesraices.com'); // quien envia el mail
               $mail->addAddress('admin@bienesraices.com','BienesRaices.com'); //Quien lo recibie

               // Content
               $mail->Subject='Tienes un nuevo mensaje';

               //Habilitar HTML
               $mail->isHTML(true);
               $mail->CharSet= 'UTF-8'; //Recibir diferentes caracteres

               //Definir contenido
               $contenido = '<html>';
               $contenido .= '<p> Tienes un nuevo mensaje </p>'; //.= concatenar
               $contenido .= '<p> Nombre: '. $respuestas['nombre']  .' </p>';
               

               // Enviar de forma condicional algunos campos de email o teléfono
               if($respuestas['contacto']==='telefono'){
                    $contenido .= '<p> Eligio ser contactado por Teléfono </p>';
                    $contenido .= '<p> Telefono: '. $respuestas['telefono']  .' </p>';
                    $contenido .= '<p> Fecha contacto: '. $respuestas['fecha']  .' </p>';
                    $contenido .= '<p> Hoara de contacto: '. $respuestas['hora']  .' </p>';
               }else{
                    //Es email, entonces agregamos el campo de email
                    $contenido .= '<p> Eligio ser contactado por E-mail </p>';
                    $contenido .= '<p> Email: '. $respuestas['email']  .' </p>';
               }
               $contenido .= '<p> Mensaje: '. $respuestas['mensaje']  .' </p>';
               $contenido .= '<p> Vende o Compra: '. $respuestas['tipo']  .' </p>';
               $contenido .= '<p> Precio o  Presupuesto: €'. $respuestas['precio']  .' </p>';
               $contenido .= '<p> Prefiere ser contactado por: '. $respuestas['contacto']  .' </p>';
               $contenido .= '</html>';

               $mail->Body = $contenido;
               $mail->AltBody = 'Esto es texto alternativo';

               //Enviar el mail
               if($mail->send()){
                    $mensaje = "Mensaje enviado correctamente";
               }else{
                    $mensaje =  "Mensaje no enviado - ERROR";
               };

          

          };
          
          $router->render('paginas/contacto',[
               'mensaje' => $mensaje
          ]);
     }
 
}