/// <reference types="cypress" />

describe('Probar la Autenticacion', ()=>{
     it('Prueba la autenticacion en /login', ()=>{
          cy.visit('/login')

          // Probando login
          cy.get('[data-cy="heading-login"]').should('exist');
          cy.get('[data-cy="heading-login"]').should('have.text','Iniciar Sesion')
          // formulario login
          cy.get('[data-cy="formulario-login"]').should('exist');
          // Ambos campos son obligatorios
          cy.get('[data-cy="formulario-login"]').submit();
          cy.get('[data-cy="alerta-login"]').should('exist');
          cy.get('[data-cy="alerta-login"]').first().should('have.class','alerta error');

          //Verificar que el usuario exista
          cy.get('[data-cy="formulario-login"]')
     });
})