<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
/*$routes->get('/', 'Home::index');*/

$routes->get('/testdb', 'TestDB::index');

$routes->get('/', function () {
    return view('home');
});

$routes->get('/rutas', 'RutaController::index');

$routes->get('/rutas/create', 'RutaController::create');

$routes->post('/rutas/store', 'RutaController::store');

$routes->get('/rutas/edit/(:num)', 'RutaController::edit/$1');

$routes->post('/rutas/update/(:num)', 'RutaController::update/$1');

$routes->get('/rutas/delete/(:num)', 'RutaController::delete/$1');

$routes->get('/estaciones', 'EstacionController::index');

$routes->get('/estaciones/create', 'EstacionController::create');

$routes->post('/estaciones/store', 'EstacionController::store');

$routes->get('/estaciones/edit/(:num)', 'EstacionController::edit/$1');

$routes->post('/estaciones/update/(:num)', 'EstacionController::update/$1');

$routes->get('/estaciones/delete/(:num)', 'EstacionController::delete/$1');

$routes->get('/unidades', 'UnidadController::index');

$routes->get('/unidades/create', 'UnidadController::create');

$routes->post('/unidades/store', 'UnidadController::store');

$routes->get('/unidades/edit/(:num)', 'UnidadController::edit/$1');

$routes->post('/unidades/update/(:num)', 'UnidadController::update/$1');

$routes->get('/unidades/delete/(:num)', 'UnidadController::delete/$1');

$routes->get(
    '/ruta-estacion',
    'RutaEstacionController::index'
);

$routes->get(
    '/ruta-estacion/create',
    'RutaEstacionController::create'
);

$routes->post(
    '/ruta-estacion/store',
    'RutaEstacionController::store'
);

$routes->get(
    '/ruta-estacion/delete/(:num)',
    'RutaEstacionController::delete/$1'
);


$routes->get(
    '/ruta-estacion/edit/(:num)',
    'RutaEstacionController::edit/$1'
);

$routes->post(
    '/ruta-estacion/update/(:num)',
    'RutaEstacionController::update/$1'
);