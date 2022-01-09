document.addEventListener('DOMContentLoaded',function (params) {
     
     eventListeners();

     darkMode();
});

// Funcion de DarkMode
 function darkMode() {
 
     const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)'); // leer preferencias del sistema
     // console.log(prefiereDarkMode);

     if(prefiereDarkMode.matches){
          document.body.classList.add('dark-mode');
     }else{
          document.body.classList.remove('dark-mode'); 
     };

     prefiereDarkMode.addEventListener('change',function () {
          if(prefiereDarkMode.matches){
               document.body.classList.add('dark-mode');
          }else{
               document.body.classList.remove('dark-mode'); 
          }  
     })

     const botonDarkMode = document.querySelector('.dark-mode-boton');

     botonDarkMode.addEventListener('click',function () {
          document.body.classList.toggle('dark-mode');
     })
 }

// funcion del menu hamburguesa
function eventListeners() {
     const mobileMenu = document.querySelector('.mobile-menu');

     mobileMenu.addEventListener('click',navegacionResponsive);

     //Muestra campos condicionales
     const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
     metodoContacto.forEach(input=> input.addEventListener('click', mostrarMetodosContacto))
}

function navegacionResponsive() {
     const navegacion = document.querySelector('.navegacion');
     if(navegacion.classList.contains('mostrar-menu')){
          navegacion.classList.remove('mostrar-menu');

     }else{
          navegacion.classList.add('mostrar-menu'); 
     }
}/* finaliza el menu de hamburguesa*/

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('#contacto');

    if(e.target.value=== 'telefono'){
         contactoDiv.innerHTML = `<br>
         <label for="telefono">Numero Teléfono:</label>
         <input type="tel" placeholder="Tu telefono" id="telefono"  name='contacto[telefono]' >

         <p>Elija la fecha y la hora para la llamada</p>

         <label for="fecha">Fecha:</label>
         <input type="date"  id="fecha"  name='contacto[fecha]'>

         <label for="hora">Hora:</label>
         <input type="time"  id="hora" min="9:00" max="10:00"  name='contacto[hora]'>

         `;
    }else{
         contactoDiv.innerHTML = `<br>
               <label for="email">email:</label>
               <input type="text" placeholder="Tu Email" id="email"  name='contacto[email]' >
         `;
    }

    console.log(e);

}