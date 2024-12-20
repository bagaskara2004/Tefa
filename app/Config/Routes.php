<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// user
$routes->get('/', 'Home::index');
$routes->get('project', 'Project::index');

$routes->group('', ['filter' => 'user'], function ($routes) {
    $routes->get('order', 'Order::index');
    $routes->post('order', 'Order::addOrder');
});

// actived user
$routes->group('actived', ['filter' => 'actived'], function ($routes) {
    $routes->get('form', 'Actived::index');
    $routes->post('form', 'Actived::index');
    $routes->get('resendotp', 'Actived::resendOtp');
});

//admin
$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
});

//auth
$routes->group('auth', ['filter' => 'auth'], function ($routes) {
    $routes->get('registeruser', 'AuthUser::register');
    $routes->post('registeruser', 'AuthUser::register');
    $routes->get('loginuser', 'AuthUser::login');
    $routes->post('loginuser', 'AuthUser::login');
});

// api
$routes->group('api', function ($routes) {
    $routes->post('adduser', 'ApiUser::create');
    $routes->get('user', 'ApiUser::index');
});
