<?php

use CodeIgniter\Router\RouteCollection;
use Config\Services;

/**
 * Create a new instance of our RouteCollection class.
 */
$routes = Services::routes();

/**
 * Load the system's routing file first, so that the app and ENVIRONMENT
 * can override as needed.
 */
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('products', 'Product::index');
$routes->get('products/new', 'Product::new');
$routes->post('products', 'Product::create');
$routes->get('products/(:num)', 'Product::show/$1');
$routes->get('products/(:num)/edit', 'Product::edit/$1');
$routes->post('products/(:num)/update', 'Product::update/$1');
$routes->post('products/(:num)/delete', 'Product::delete/$1');
