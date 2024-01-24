<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Unidades
$routes->get('/unidades', 'Home::index');
$routes->get('/unidades', 'Unidades::index');
$routes->get('/unidades/nuevo', 'Unidades::nuevo'); // Ruta específica 
$routes->post('unidades/insertar', 'Unidades::insertar');
$routes->get('unidades/editar/(:num)', 'Unidades::editar/$1');
$routes->post('unidades/actualizar', 'Unidades::actualizar');
$routes->get('unidades/eliminar/(:num)', 'Unidades::eliminar/$1');
$routes->get('unidades/eliminados', 'Unidades::eliminados');
$routes->get('unidades/reingresar/(:num)', 'Unidades::reingresar/$1');

//Categorias
$routes->get('/categorias', 'categorias::index');
$routes->get('/categorias/nuevo', 'categorias::nuevo'); // Ruta 
$routes->post('categorias/insertar', 'categorias::insertar');
$routes->get('categorias/editar/(:num)', 'categorias::editar/$1');
$routes->post('categorias/actualizar', 'categorias::actualizar');
$routes->get('categorias/eliminar/(:num)', 'categorias::eliminar/$1');
$routes->get('categorias/eliminados', 'categorias::eliminados');
$routes->get('categorias/reingresar/(:num)', 'categorias::reingresar/$1');

//Productos
$routes->get('/productos', 'productos::index');
$routes->get('/productos/nuevo', 'productos::nuevo'); // Ruta 
$routes->post('productos/insertar', 'productos::insertar');
$routes->get('productos/editar/(:num)', 'productos::editar/$1');
$routes->post('productos/actualizar', 'productos::actualizar');
$routes->get('productos/eliminar/(:num)', 'productos::eliminar/$1');
$routes->get('productos/eliminados', 'productos::eliminados');
$routes->get('productos/reingresar/(:num)', 'productos::reingresar/$1');
$routes->get('/productos/autocompleteData', 'productos::autocompleteData');

//Clientes
$routes->get('/clientes', 'clientes::index');
$routes->get('/clientes/nuevo', 'clientes::nuevo'); // Ruta 
$routes->post('clientes/insertar', 'clientes::insertar');
$routes->get('clientes/editar/(:num)', 'clientes::editar/$1');
$routes->post('clientes/actualizar', 'clientes::actualizar');
$routes->get('clientes/eliminar/(:num)', 'clientes::eliminar/$1');
$routes->get('clientes/eliminados', 'clientes::eliminados');
$routes->get('clientes/reingresar/(:num)', 'clientes::reingresar/$1');
$routes->get('/clientes/autocompleteData', 'Clientes::autocompleteData');


//Configuracion
$routes->get('/configuracion', 'configuracion::index');
$routes->post('configuracion/actualizar', 'configuracion::actualizar');

//Usuarios

$routes->get('/usuarios', 'usuarios::index');
$routes->get('/usuarios/nuevo', 'usuarios::nuevo'); // Ruta específica 
$routes->post('usuarios/insertar', 'usuarios::insertar');
$routes->get('usuarios/editar/(:num)', 'usuarios::editar/$1');
$routes->post('usuarios/actualizar', 'usuarios::actualizar');
$routes->get('usuarios/eliminar/(:num)', 'usuarios::eliminar/$1');
$routes->get('usuarios/eliminados', 'usuarios::eliminados');
$routes->get('usuarios/reingresar/(:num)', 'usuarios::reingresar/$1');

$routes->post('usuarios/valida', 'usuarios::valida');
$routes->get('usuarios/logout', 'usuarios::logout');
$routes->get('usuarios/cambia_password', 'usuarios::cambia_password');
$routes->post('usuarios/actualiza_password', 'usuarios::actualiza_password');




//login
$routes->get('/', 'usuarios::login');

//Cajas
$routes->get('cajas', 'cajas::index');
$routes->get('cajas', 'cajas::index');
$routes->get('cajas/nuevo', 'cajas::nuevo'); // Ruta específica 
$routes->post('cajas/insertar', 'cajas::insertar');
$routes->get('cajas/editar/(:num)', 'cajas::editar/$1');
$routes->post('cajas/actualizar', 'cajas::actualizar');
$routes->get('cajas/eliminar/(:num)', 'cajas::eliminar/$1');
$routes->get('cajas/eliminados', 'cajas::eliminados');
$routes->get('cajas/reingresar/(:num)', 'cajas::reingresar/$1');

//Roles
$routes->get('/roles', 'roles::index');
$routes->get('/roles/nuevo', 'roles::nuevo'); // Ruta 
$routes->post('roles/insertar', 'roles::insertar');
$routes->get('roles/editar/(:num)', 'roles::editar/$1');
$routes->post('roles/actualizar', 'roles::actualizar');
$routes->get('roles/eliminar/(:num)', 'roles::eliminar/$1');
$routes->get('roles/eliminados', 'roles::eliminados');
$routes->get('roles/reingresar/(:num)', 'roles::reingresar/$1');

//compras
$routes->get('/compras', 'compras::index');
$routes->get('/compras', 'compras::index');
$routes->get('compras/nuevo', 'compras::nuevo'); // Ruta específica 
$routes->post('compras/insertar', 'compras::insertar');
$routes->get('compras/editar/(:num)', 'compras::editar/$1');
$routes->post('compras/actualizar', 'compras::actualizar');
$routes->get('compras/eliminar/(:num)', 'compras::eliminar/$1');
$routes->get('compras/eliminados', 'compras::eliminados');
$routes->get('compras/reingresar/(:num)', 'compras::reingresar/$1');
//guarda detalles de la compra
$routes->post('compras/guarda', 'compras::guarda');




// Ruta para el método buscarPorCodigo con el método get
$routes->get('productos/buscarPorCodigo/(:num)', 'productos::buscarPorCodigo/$1');
//compras 
$routes->post('temporalCompra/insertar/(:num)/(:num)/(:alphanum)', 'TemporalCompra::insertar/$1/$2/$3');
$routes->delete('temporalCompra/eliminar/(:num)/(:alphanum)', 'TemporalCompra::eliminar/$1/$2');


$routes->get('compras/muestraCompraPdf/(:num)', 'compras::muestraCompraPdf/$1');
$routes->get('compras/generaCompraPdf/(:num)', 'Compras::generaCompraPdf/$1');


//ventas
$routes->get('ventas/venta', 'ventas::venta');
$routes->post('ventas/guarda', 'ventas::guarda');
$routes->get('ventas/muestraTicket/(:num)', 'ventas::muestraTicket/$1');
$routes->get('ventas/generaTicket/(:num)', 'ventas::generaTicket/$1');
