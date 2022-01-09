/// <reference types="cypress" />

describe('Carga la pagina principal', ()=>{
     it('prueba el header de la pagina principal',()=>{
          cy.visit('/')

          cy.get('[data-cy="heading-sitio"]').should('exist');
          cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal','Venta de casas y apartamentos exclusivos de lujo');

          cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal', 'Bienes raices');

     });

     it('prueba el bloque de los iconos principales', ()=>{

          cy.get('[data-cy="heading-nosotros"]').should('exist');
          cy.get('[data-cy="heading-nosotros"]').should('have.prop','tagName').should('equal','H2');

          // Selecciona los iconos
          cy.get('[data-cy="iconos-nosotros"]').should('exist');
          cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length',3);
          // negar la condición
          cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('not.have.length',4);
     });

     it('prueba el bloque seccion propiedades', ()=>{

          // existe un anuncio, debe haber 3 anuncios
          cy.get('[data-cy="anuncios"]').should('exist');
          cy.get('[data-cy="anuncios"]').should('have.length',3);

          // probar enlaces.
          cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo')
          cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal',' Ver Propiedad');

          //simular un click - enlace
          cy.get('[data-cy="enlace-propiedad"]').first().click();
          cy.get('[data-cy="titulo-propiedad"]').should('exist');

          // Volver a la pagina principal
          cy.go('back');

     });

     it('Prueba el routing hacia todas las propiedades',()=>{ //callback
          cy.get('[data-cy="ver-propiedades"]').should('exist');
          cy.get('[data-cy="ver-propiedades"]').should('have.class','boton-verde');
          cy.get('[data-cy="ver-propiedades"]').invoke('attr', 'href').should('equal','propiedades');

          cy.get('[data-cy="ver-propiedades"]').click();
          cy.get('[data-cy="heading-propiedades"]').invoke('text').should('equal','Casa en venta frente al bosque')

          cy.go('back');

     });

     it('Prueba el bloque de contacto',()=>{
          cy.get('[data-cy="imagen-contacto"]').should('exist');
          cy.get('[data-cy="imagen-contacto"]').find('h2').invoke('text').should('equal','Encuentra la casa de tus sueños');
          cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr', 'href')
          .then( href =>{
               cy.visit(href)
          });
          cy.get('[data-cy="heading-contacto"]').should('exist')

          cy.wait(1000);
          cy.visit('/');

     });
});