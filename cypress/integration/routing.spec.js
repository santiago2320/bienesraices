/// <reference types="cypress" />

describe ('Prueba la navegacion y Routing del header y footer',()=>{
     it('prueba la navegacion del header',()=>{
          cy.visit('/')

          cy.get('[data-cy="navegacion-header"]').should('exist');
          cy.get('[data-cy="navegacion-header"]').find('a').should('have.length',4);


          //Revisar que los enlaces sean correctos
          cy.get('[data-cy="navegacion-header"]').find('a').eq(0).invoke('attr','href').should('equal', '/nosotros')
          cy.get('[data-cy="navegacion-header"]').find('a').eq(0).invoke('text').should('equal','Nosotros')
     });

     it('prueba la navegacion del footer',()=>{
          cy.get('[data-cy="navegacion-footer"]').should('exist'); 
          
          //Revisar que los enlaces sean correctors
          cy.get('[data-cy="navegacion-footer"]').find('a').eq(0).invoke('attr','href').should('equal', '/nosotros')
     })
})