<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Usuarios_Control');

$routes->get('Login', 'Usuarios_Control::Login');//Tela Login
$routes->post('Logar', 'Usuarios_Control::Logar');//Validação Login
$routes->get('Cadastrar', 'Usuarios_Control::CadastrarCliente');//Tela Cadastro Cliente
$routes->post('Cadastrar/usuario', 'Usuarios_Control::CadastrarClientes');//Cadastrar Cliente
$routes->get('Home', 'Home');//Tela Home
$routes->get('Menu', 'Cardapio_Control');//Tela cardapio
$routes->post('Adicionar', 'Cardapio_Control::Adicionar');
$routes->get('Menu', 'Cardapio_Control::Menu');
$routes->post('Compra', 'Cardapio_Control::Compra');


//$routes->get('view', 'Home::view2');
//$routes->get('view/(:segment)', 'Home::view/$1');
//$routes->match(['get', 'post'], '/upload', 'UploadController::upload');
//$routes->get('/image/view/(:segment)', 'UploadController::view/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}