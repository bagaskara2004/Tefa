<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// user
$routes->group('', function ($routes) {

    $routes->get('/', 'Home::index');
    $routes->get('/project', 'Project::index');
    $routes->get('/logout',function () {
        if (session('user')) {
            session()->remove('user');
            delete_cookie('remember_me');
            return redirect()->to('/auth/login')->withCookies()->with('success','Success Logout Your Account');
        }
        return redirect()->back()->with('error',"can't access that page");
    });

    $routes->get('order', 'Order::index');
    $routes->post('order', 'Order::addOrder');
});

// Admin
$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');

    // Order management routes
    $routes->get('orders', 'OrderController::index');
    $routes->get('orders/edit/(:num)', 'OrderController::edit/$1');
    $routes->get('orders/delete/(:num)', 'OrderController::delete/$1');

    // User management routes
    $routes->get('users', 'UserController::index');
    $routes->post('users/delete/(:num)', 'UserController::delete/$1');

    // Project management routes
    $routes->get('projects', 'ProjectController::index'); // List projects
    $routes->get('projects/create', 'ProjectController::create'); // Show create project form
    $routes->post('projects/store', 'ProjectController::store'); // Store new project
    $routes->get('projects/edit/(:num)', 'ProjectController::edit/$1'); // Show edit project form
    $routes->post('projects/update/(:num)', 'ProjectController::update/$1'); // Update project
    $routes->get('projects/delete/(:num)', 'ProjectController::delete/$1'); // Delete project
});

//auth
$routes->group('auth', function ($routes) {
    
    $routes->get('actived/(:any)','Actived::index/$1',['filter' => 'actived']);//done
    $routes->post('actived/(:any)','Actived::index/$1',['filter' => 'actived']);//done

    $routes->get('resendactived/(:any)','Actived::resendOtp/$1',['filter' => 'actived']);//done
    
    $routes->get('register','Register::index',['filter' => 'auth']);//done
    $routes->post('register','Register::index',['filter' => 'auth']);//done
    
    $routes->get('login','Login::index',['filter' => 'auth']);//done
    $routes->post('login','Login::index',['filter' => 'auth']);//done
    
    $routes->get('forgot','Forgot::index',['filter' => 'auth']);//done
    $routes->post('forgot','Forgot::index',['filter' => 'auth']);//done
    
    $routes->get('forgot/(:any)','Forgot::changePassword/$1',['filter' => 'forgot']);//done
    $routes->post('forgot/(:any)','Forgot::changePassword/$1',['filter' => 'forgot']);//done
    $routes->get('resendforgot/(:any)','Forgot::resendOtp/$1',['filter' => 'forgot']);//done
});

// api
$routes->group('api', function ($routes) {
    $routes->post('register','Api::register');//done
    $routes->post('login','Api::login');//done
    $routes->post('forgot','Api::forgot');//done
    $routes->get('user','Api::getUser',['filter' => 'api']);//done
});
