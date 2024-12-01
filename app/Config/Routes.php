<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'about::index');
$routes->get('/project', 'project::index');
$routes->get('/auth', 'auth::index');
$routes->get('/productlist/getProducts', 'ProductList::getProducts');
