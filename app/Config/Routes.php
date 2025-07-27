<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Public routes for Shield authentication
service('auth')->routes($routes);

// Public product view route
$routes->get('product/(:segment)', 'Product::show/$1');
$routes->post('cart/add', 'Cart::add');
$routes->get('cart', 'Cart::index');

// Admin Routes (Secured by a filter)
$routes->group('admin', ['filter' => 'auth-groups:superadmin,admin'], function($routes) {
    $routes->get('/', 'Admin\Dashboard::index', ['as' => 'admin-dashboard']);


    // Resourceful routes for Products (CRUD)
    $routes->resource('products', ['controller' => 'Admin\Products', 'as' => 'products']);
});
