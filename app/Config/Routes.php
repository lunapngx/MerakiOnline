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
    $routes->get('products', 'Products::index', ['as' => 'products-index']);
    $routes->get('products/new', 'Products::new', ['as' => 'products-new']);
    $routes->post('products', 'Products::create', ['as' => 'products-create']);
    $routes->get('products/edit/(:num)', 'Products::edit/$1', ['as' => 'products-edit']);
    $routes->put('products/(:num)', 'Products::update/$1', ['as' => 'products-update']);
    $routes->delete('products/(:num)', 'Products::delete/$1', ['as' => 'products-delete']);
        // This is the new route that fixes the error
    $routes->get('products/(:num)', 'Products::show/$1', ['as' => 'product-detail']);

});