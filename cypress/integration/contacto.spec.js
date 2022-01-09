/// <reference types="cypress" />

describe('Prueba el formulario de contacto', ()=>{
     it('prueba de la pagina de contacto y el envio emails',()=>{
          cy.visit('/contacto')

          cy.get('[data-cy="heading-contacto"]').should('exist');
          cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal', 'Contacto');

          cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal','Llene el formulario de contacto')

     });

     it('Llena los campos de formulario',()=>{
          cy.get('[data-cy="input-nombre"]').type('Santiago')
          cy.get('[data-cy="input-mensaje"]').type('Estoy interesado en comprar una casa')
          cy.get('[data-cy="input-opciones"]').select('Compra')
          cy.get('[data-cy="input-precio"]').type('150')
          cy.get('[data-cy="input-radio"]').eq(0).check();

          cy.wait(3000);

          cy.get('[data-cy="input-radio"]').eq(1).check();
     })
});