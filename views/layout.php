<?php 
 
if(!isset($_SESSION)){
    session_start();
}
 
$auth = $_SESSION['login'] ?? false;
 
if(!isset($inicio)){
    $inicio = false;
}
 
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../build/css/app.css">
     <title>Bienes Raices</title>
</head>
<body>
 
<header class="header <?php echo $inicio ? 'inicio' : '' ?>">
     <div class="contenedor contenido-header">
          <div class="barra">
               <a href="index.php">
                    <img src="/build/img/logo.svg" alt="Logotipo">
               </a>
               <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
               </div>
               <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="" >
                    <nav data-cy="navegacion-header" class="navegacion">
                         <a href="/nosotros">Nosotros</a>
                         <a href="propiedades">Anuncios</a>
                         <a href="/blog">Blog</a>
                         <a href="/contacto">Contacto</a>
                         <?php if($auth): ?>
                              <a href="/logout">Cerrar Sesion</a>
                         <?php endif ?>
                    </nav>
               </div>
          </div><!--cierre de la barra-->
          <?php echo $inicio ? "<h1 data-cy='heading-sitio'>Venta de casas y apartamentos exclusivos de lujo<h1>":'';?>
     </div>
</header>

<?php echo $contenido; ?> 


<footer class="footer seccion">
     <div class="contenedor contenedor-footer">
          <nav data-cy="navegacion-footer" class="navegacion">
               <a href="/nosotros">Nosotros</a>
               <a href="/propiedades">Propiedades</a>
               <a href="/blog">Blog</a>
               <a href="/contacto">Contacto</a>
          </nav>
     </div>

     <p class="copyright">Todos los Derechos Reservados <?php echo date('Y')  ?> &copy;</p>
</footer>
<script src="../build/js/bundle.min.js"></script>     
</body>
</html>