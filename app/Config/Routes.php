<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/user', 'ApiUser::index');
$routes->post('/registeruser', 'ApiUser::create');

$routes->get('/about', 'about::index');
$routes->get('/project', 'project::index');
$routes->get('/auth', 'auth::index');
$routes->get('/productlist/getProducts', 'ProductList::getProducts');
