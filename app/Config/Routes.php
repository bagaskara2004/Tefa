<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// user
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/project', 'Project::index');
$routes->get('/order', 'Order::index');

//admin
$routes->get('/dashboard', 'Dashboard::index');


//auth
$routes->get('/registeruser', 'AuthUser::register');
$routes->post('/registeruser', 'AuthUser::register');
$routes->get('/loginuser', 'AuthUser::login');

// api
$routes->post('/adduser', 'ApiUser::create');
$routes->get('/user', 'ApiUser::index');