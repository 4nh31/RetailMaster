<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'retailmaster';

/*RUTAS DE INVENTARIO*/
$route['inventario'] = 'inventarioController/inventario';

/* Rutas de inventario para administrador */
$route['inventario_admin'] = 'inventarioController/inventarioAdmin';
$route['producto/eliminar/(:num)'] = 'inventarioController/eliminar/$1';

/*rutas de clientes*/
$route['ventas'] = 'retailmaster/ventas';
$route['retailmaster/productosNuevo'] = 'retailmaster/productosNue';
$route['retailmaster/productosModificar'] = 'retailmaster/productosMod';

$route['retailmaster/productosEliminar'] = 'retailmaster/productosEli';

/* RUTAS DE PRODUCTO */
$route['retailmaster'] = 'retailmaster/guardarProducto';
$route['retailmaster/dashboard_ventas'] = 'retailmaster/dashboard_ventas';
$route['retailmaster/productosAcciones'] = 'retailmaster/productosAcci';


$route['producto/buscar'] = 'retailmaster/buscarProducto';
$route['productos/actualizar'] = 'retailmaster/actualizar';

$route['productos/eliminar'] = 'retailmaster/eliminar';

$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;


























