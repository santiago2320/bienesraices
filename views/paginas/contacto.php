
<main class="contenedor seccion">
     <h1 data-cy="heading-contacto">Contacto</h1>

     <?php if($mensaje){ ?>
               <p class='alerta exito'><?php echo $mensaje; ?></p>";
          <?php } ?>

     <picture>
          <source srcset="build/img/destacada3.webp" type="image/webp">
          <source srcset="build/img/destacada3.jpg" type="image/jpeg">
          <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
     </picture>

     <h2 data-cy="heading-formulario">Llene el formulario de contacto</h2>
     <form class="formulario" action="/contacto" method="POST">
          <fieldset>
               <legend>Informacion Personal</legend>

               <label for="nombre">Nombre:</label>
               <input data-cy="input-nombre" type="text" placeholder="Tu Nombre" id="nombre" name='contacto[nombre]' >

               <label for="mensaje">Mensaje:</label>
               <textarea data-cy="input-mensaje"  id="mensaje" name='contacto[mensaje]' ></textarea>
          </fieldset><!--fieldeset informacion-->

          <fieldset>
               <legend>Informacion sobre la propiedad</legend>

               <label for="opciones">Vende o Compra</label>
               <select data-cy="input-opciones"  id="opciones"  name='contacto[tipo]'>
                    <option value="" disabled selected>-- Seleccione</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
               </select>

               <label for="presupuesto">Precio o Presupuesto:</label>
               <input data-cy="input-precio" type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto"  name='contacto[precio]'>
          </fieldset>

          <fieldset>
               <legend>Contacto</legend>
               <p>Como desea ser contactado</p>
               <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input data-cy="input-radio" type="radio" value="telefono" id="contactar-telefono"  name='contacto[contacto]' >

                    <label for="contactar-email">email</label>
                    <input data-cy="input-radio" type="radio"  type="radio" value="email" id="contactar-email"  name='contacto[contacto]' >
               </div>

               <div id="contacto"></div>

          </fieldset>

          <input type="submit" value="enviar" class="boton-verde" >
     </form>
</main>