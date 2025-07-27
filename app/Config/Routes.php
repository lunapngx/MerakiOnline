<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about', ['as' => 'about']);
$routes->get('categories', 'CategoryController::index', ['as' => 'categories_list']);

// Public routes for Shield authentication
service('auth')->routes($routes);

// Public routes
$routes->post('cart/add', 'Cart::add');

// These routes replace the old ones
$routes->get('product/(:num)', 'ProductController::detail/$1', ['as' => 'product_detail']);
$routes->get('cart', 'CartController::view', ['as' => 'cart_view']);
$routes->get('categories', 'CategoryController::list', ['as' => 'categories_list']);

// Cart and Checkout Routes (Combined)
$routes->get('cart', 'CartController::index', ['as' => 'cart_view']);
$routes->post('cart/add', 'CartController::add', ['as' => 'cart_add']);
$routes->post('cart/update', 'CartController::update', ['as' => 'cart_update']); // Your route
$routes->post('cart/remove', 'CartController::remove', ['as' => 'cart_remove']); // Your route (remote had remove/(:any))
$routes->get('checkout', 'CheckoutController::index', ['as' => 'checkout_view']);
$routes->post('checkout/process', 'CheckoutController::process', ['as' => 'checkout_process']); // Your route
$routes->post('order/place', 'OrderController::place', ['as' => 'order_place']); // Your route
$routes->post('/checkout/place-order', 'OrderController::placeOrder', ['as' => 'place_order']); // Remote's explicit place order

// Routes for Authenticated Users (requires login)
// Routes for Authenticated Users (requires login)
$routes->group('user', ['filter' => 'auth-groups:user,superadmin,admin'], function($routes) {
    $routes->get('account', 'AccountController::index', ['as' => 'account']);
    $routes->get('account/orders', 'AccountController::orders', ['as' => 'account_orders']);
    $routes->get('account/wishlist', 'AccountController::wishlist', ['as' => 'account_wishlist']);
    $routes->get('checkout', 'CheckoutController::view', ['as' => 'checkout_view']);
});

// Admin Routes (Secured by a filter)
$routes->group('admin', ['filter' => 'auth-groups:superadmin,admin'], function($routes) {
    $routes->get('/', 'Admin\Dashboard::index', ['as' => 'admin-dashboard']);
    $routes->get('products', 'Admin\Products::index', ['as' => 'products-index']);
    $routes->get('products/new', 'Admin\Products::new', ['as' => 'products-new']);
    $routes->post('products', 'Admin\Products::create', ['as' => 'products-create']);
    $routes->get('products/edit/(:num)', 'Admin\Products::edit/$1', ['as' => 'products-edit']);
    $routes->put('products/(:num)', 'Admin\Products::update/$1', ['as' => 'products-update']);
    $routes->delete('products/(:num)', 'Admin\Products::delete/$1', ['as' => 'products-delete']);
    $routes->get('product/(:segment)', 'Admin\Products::show/$1', ['as' => 'product-detail']);
    $routes->get('orders', 'Admin\Orders::index', ['as' => 'admin-orders']);
    $routes->get('users', 'Admin\Users::index', ['as' => 'admin-users']);
    $routes->get('sales-report', 'Admin\SalesReport::index', ['as' => 'admin-sales-report']);
    $routes->get('account', 'Admin\AdminAccount::index', ['as' => 'admin-account']);
});