
<main class="contenedor seccion contenido-centrado">
     <h1 data-cy="heading-login">Iniciar Sesion</h1>

     <?php foreach ($errores as $error):?> 
          <div data-cy="alerta-login" class="alerta error">
          <?php echo $error; ?>
          </div>
     <?php endforeach;?>

     <form data-cy="formulario-login" method="POST" action="/login" class="formulario" >
           <fieldset>
               <legend>Email y Password</legend>

               <label for="email">email:</label>
               <input type="email" name="email"  placeholder="Tu Email" id="email" >

               <label for="password">Password:</label>
               <input type="password" name="password" placeholder="Password" id="password" >

          </fieldset><!--fieldeset informacion-->

          <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
     </form>
</main>