
<main class="contenedor seccion">
     <h2 data-cy="heading-nosotros">Mas Sobre nosotros</h2>
     <?php include 'iconos.php'?>
</main>

<section class="seccion contenedor">
     <h3>Casas y Depas en ventas</h3>

     <?php 
     
          $limit = 3;
          include 'listado.php';
     ?>

     <div class="align-right">
          <a href="propiedades" class="boton-verde" data-cy="ver-propiedades">Ver todas</a>
     </div>
</section><!--Section de anuncios-->

<section data-cy="imagen-contacto" class="imagen-contacto">
     <h2>Encuentra la casa de tus sueños</h2>
     <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
     <a href="/contacto" class="boton-amarillo-inline">Contactanos</a>
</section> <!--Seccion de contato-->

<div class="contenedor seccion seccion-inferior">
     <section class="blog">
          <h3>Nuestro Blog</h3>

          <article class="entrada-blog">
               <div class="imagen">
                    <picture>
                         <source srcset="build/img/blog1.webp" type="image/webp">
                         <source srcset="build/img/blog1.jpg" type="image/jpeg">
                         <img loading="lazy" src="build/img/blog1.jpg" alt="Texto de entrada blog">
                    </picture>
               </div>
               <div class="texto-entrada">
                    <a href="entrada.php">
                         <h4>Terraza en el techo de tu casa</h4>
                         <p class="informacion-meta">escrito El: <span>20/10/2021</span>por: <span>Admin</span></p>

                         <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>


                    </a>
               </div>
          </article><!--Articulo-1-->
          <article class="entrada-blog">
               <div class="imagen">
                    <picture>
                         <source srcset="build/img/blog2.webp" type="image/webp">
                         <source srcset="build/img/blog2.jpg" type="image/jpeg">
                         <img loading="lazy" src="build/img/blog2.jpg" alt="Texto de entrada blog">
                    </picture>
               </div>
               <div class="texto-entrada">
                    <a href="entrada.php">
                         <h4>Guia para decoracion de tu hogar</h4>
                         <p class="informacion-meta">escrito El: <span>20/10/2021</span>por: <span>Admin</span></p>

                         <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darte vida a tu espacio</p>


                    </a>
               </div>
          </article><!--Articulo-2-->
     </section><!--Secccion articulos-->

     <section class="testimoniales">
          <h3>testimonial</h3>
          <div class="testimonial">
               <blockquote>
                    El personal se comporto de una excelente forma, muy buena atencion y la Casa
                    que me ofrecion cumple con todas mi expectativas
               </blockquote>
               <p>-Santiago parra</p>
          </div>
     </section>
</div>