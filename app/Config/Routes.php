<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// user
$routes->group('/', function ($routes) {

    $routes->get('', 'Home::index');
    $routes->get('project', 'Project::index');
    $routes->get('logout',function () {
        if (session('user')) {
            session()->remove('user');
            delete_cookie('remember_me');
            return redirect()->to('/auth/login')->withCookies()->with('success','Success Logout Your Account');
        }
        return redirect()->back()->with('error',"can't access that page");
    });

    $routes->get('order', 'Order::index',['filter' => 'user']);
    $routes->post('order', 'Order::addOrder',['filter' => 'user']);
    $routes->delete('order/delete','Order::deleteOrder',['filter' => 'user']);
});

//admin
$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
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
