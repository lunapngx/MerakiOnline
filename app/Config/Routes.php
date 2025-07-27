<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Public routes for Shield authentication
service('auth')->routes($routes);

// Public product view route
// IMPORTANT: Added 'as' => 'product_detail' to allow url_to() to find this route.
// Ensure the alias matches what's used in views (e.g., url_to('product_detail', $product->id))
$routes->get('product/(:segment)', 'Product::show/$1', ['as' => 'product_detail']);
$routes->post('cart/add', 'Cart::add');
// Define the 'cart_view' route here by adding an alias to the existing cart route.
$routes->get('cart', 'Cart::index', ['as' => 'cart_view']);
// Define the 'categories_list' route here
// This route will display a list of product categories.
// You should create a dedicated controller (e.g., Category) for this.
$routes->get('categories', 'Home::index', ['as' => 'categories_list']);

// Routes for Authenticated Users (requires login)
// This group uses the 'session' filter provided by CodeIgniter Shield
// to ensure only logged-in users can access these routes.
$routes->group('/', ['filter' => 'session'], function($routes) {
    // Define the 'account' route here
    // You might want to create a dedicated 'User\Account' controller for this,
    // but for now, it points to Home::index as a placeholder to resolve the route error.
    $routes->get('account', 'Home::index', ['as' => 'account']);
    // Define the 'account_orders' route here
    // This route will display a user's order history.
    // You should create a dedicated controller (e.g., User\Orders) for this.
    $routes->get('account/orders', 'Home::index', ['as' => 'account_orders']);
    // Define the 'account_wishlist' route here
    // This route will display a user's wishlist.
    // You should create a dedicated controller (e.g., User\Wishlist) for this.
    $routes->get('account/wishlist', 'Home::index', ['as' => 'account_wishlist']);
    // Define the 'checkout_view' route here
    // This route will lead to the checkout page.
    // You should create a dedicated controller (e.g., Checkout) for this.
    $routes->get('checkout', 'Home::index', ['as' => 'checkout_view']);
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
    // This admin route for product detail uses 'product-detail' alias.
    // It's separate from the public 'product_detail' alias.
    $routes->get('product/(:segment)', 'Admin\Products::show/$1', ['as' => 'product-detail']);
});
