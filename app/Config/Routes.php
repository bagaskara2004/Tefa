<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// user
$routes->group('', function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('about', 'About::index');
    $routes->get('project', 'Project::index');
    $routes->get('order', 'Order::index');
});

// actived user
$routes->group('actived', function ($routes) {
    $routes->get('form', 'Actived::index');
    $routes->post('form', 'Actived::index');
    $routes->get('resendotp', 'Actived::resendOtp');
});

//admin
$routes->group('admin', function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
});

//auth
$routes->group('auth', function ($routes) {
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
