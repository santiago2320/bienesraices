<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\propiedadController;
use Controllers\VendedorController;
use Controllers\paginasController;
use Controllers\LoginController;

$router = new Router();

// ZONA PRIVADA
$router->get('/admin', [propiedadController::class, 'index']);
$router->get('/propiedades/crear',[propiedadController::class, 'crear']);
$router->post('/propiedades/crear',[propiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [propiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [propiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [propiedadController::class, 'eliminar']);


$router->get('/vendedores/crear',[VendedorController::class, 'crear']);
$router->post('/vendedores/crear',[VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

// ZONA PUBLICA URL`S PAGINAS FALTANTES
$router->get('/',[paginasController::class,'index']);
$router->get('/nosotros',[paginasController::class,'nosotros']);
$router->get('/propiedades',[paginasController::class,'propiedades']);
$router->get('/propiedad',[paginasController::class,'propiedad']);
$router->get('/blog',[paginasController::class,'blog']);
$router->get('/entrada',[paginasController::class,'entrada']);
$router->get('/contacto',[paginasController::class,'contacto']);
$router->post('/contacto',[paginasController::class,'contacto']);

// Login y Autenticacion

$router->get('/login',[LoginController::class, 'login']);
$router->post('/login',[LoginController::class, 'login']);
$router->get('/logout',[LoginController::class, 'logout']);

$router ->comprobarRutas();