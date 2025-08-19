<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'Auth::loginView'); // optional: landing is login

// Auth
$routes->get('register', 'Auth::registerView');
$routes->post('register', 'Auth::register');
$routes->get('login', 'Auth::loginView');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// Protected
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
});

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');

    // Items CRUD
    $routes->get('items', 'Items::index');
    $routes->get('items/create', 'Items::create');
    $routes->post('items/store', 'Items::store');
    $routes->get('items/edit/(:num)', 'Items::edit/$1');
    $routes->post('items/update/(:num)', 'Items::update/$1');
    $routes->get('items/delete/(:num)', 'Items::delete/$1');
});


