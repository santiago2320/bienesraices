<fieldset>
          <legend>Informacion Genereal</legend>
          <label for="nombre">Nombre:</label>
          <input type="text" id="titulo" name="vendedor[nombre]" placeholder="Nombre Vendedor(a)" value="<?php echo s( $vendedor->nombre);  ?>">

          <label for="apellido">Apellido:</label>
          <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Nombre Vendedor(a)" value="<?php echo s( $vendedor->apellido);  ?>">
</fieldset>

<fieldset>
          <legend>Informacion Adicional</legend>
          <label for="telefono">Telefono:</label>
          <input type="text" id="telefono" name="vendedor[telefono]" placeholder="Telefono Vendedor(a)" value="<?php echo s( $vendedor->telefono);  ?>">
</fieldset>