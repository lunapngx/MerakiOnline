<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about', ['as' => 'about']);

// Categories route
$routes->get('categories', 'CategoryController::index', ['as' => 'categories']);
$routes->get('category/filter/(:segment)', 'CategoryController::filter/$1');

//mae
$routes->get('login', 'LoginController::loginView');
$routes->post('login', 'LoginController::loginAction');
$routes->get('register', 'RegisterController::registerView');
$routes->post('register', 'RegisterController::registerAction');
$routes->get('products', 'ProductController::index', ['as' => 'products']);
$routes->get('/collection', 'CollectionController::index', ['as' => 'collection']);
// In app/Config/Routes.php

$routes->get('collection', 'Product::collection');

//mae

// Public routes for Shield authentication
service('auth')->routes($routes);

// Cart and Checkout Routes
$routes->get('cart', 'CartController::index', ['as' => 'cart_view']);
$routes->post('cart/add', 'CartController::add', ['as' => 'cart_add']);
$routes->post('cart/update', 'CartController::updateQuantity', ['as' => 'cart_update']);
$routes->post('cart/remove', 'CartController::removeItem', ['as' => 'cart_remove']);
$routes->post('cart/clear', 'CartController::clearCart', ['as' => 'cart_clear']);

// Checkout Routes
$routes->get('checkout', 'CheckoutController::index', ['as' => 'checkout_view']);
$routes->post('checkout/process', 'CheckoutController::process', ['as' => 'checkout_process']);
$routes->post('order/place', 'OrderController::place', ['as' => 'order_place']);
$routes->post('/checkout/place-order', 'OrderController::placeOrder', ['as' => 'place_order']);

// Product routes (Public-facing, moved outside admin group)
$routes->get('product/(:num)', 'ProductController::detail/$1', ['as' => 'product_detail']);

// Routes for Authenticated Users (requires login)
$routes->group('user', ['filter' => 'auth-groups:user,superadmin,admin'], function($routes) {
    $routes->get('account', 'AccountController::index', ['as' => 'account']);
    $routes->get('account/orders', 'AccountController::orders', ['as' => 'account_orders']);
    $routes->get('account/wishlist', 'AccountController::wishlist', ['as' => 'account_wishlist']);
    $routes->get('/', 'AccountController::index', ['as' => 'account_profile']); // Uncommented line
    $routes->get('settings', 'AccountController::settings', ['as' => 'account_settings']);
    $routes->get('payment-methods', 'AccountController::paymentMethods', ['as' => 'account_payment_methods']);
    $routes->get('reviews', 'AccountController::reviews', ['as' => 'account_reviews']);
    $routes->get('addresses', 'AccountController::addresses', ['as' => 'account_addresses']);
    $routes->get('help', 'AccountController::help', ['as' => 'account_help']);
});

// --- NEW LEGAL PAGES ROUTES ---
$routes->get('useragreements', 'LegalController::userAgreements', ['as' => 'user_agreements']);
$routes->get('contact-us', 'Home::contactUs', ['as' => 'contact_us']);
$routes->get('privacy-policy', 'Home::privacyPolicy', ['as' => 'privacy_policy']);
$routes->get('terms-and-conditions', 'Home::termsAndConditions', ['as' => 'terms_and_conditions']);


// Real-time update API route (Public-facing, moved outside admin group)
$routes->get('api/check_products', 'UpdateController::checkProducts', ['as' => 'api_check_products']);
$routes->get('api/check-products', 'Api\ProductsApi::checkProducts', ['as' => 'api_check_products']);


// Admin Routes (Secured by a filter)
$routes->group('admin', ['filter' => 'auth-groups:superadmin,admin'], function($routes) {
    $routes->get('/', 'Admin\Dashboard::index', ['as' => 'admin-dashboard']);
    $routes->get('products', 'Admin\Products::index', ['as' => 'admin-products']);
    $routes->get('products/new', 'Admin\Products::new', ['as' => 'products-new']);
    $routes->post('products', 'Admin\Products::create', ['as' => 'products-create']);
    $routes->get('products/edit/(:num)', 'Admin\Products::edit/$1', ['as' => 'products-edit']);
    $routes->put('products/(:num)', 'Admin\Products::update/$1', ['as' => 'products-update']);
    $routes->delete('products/(:num)', 'Admin\Products::delete/$1', ['as' => 'products-delete']);
    $routes->get('product/(:segment)', 'Admin\Products::show/$1', ['as' => 'product-detail']);
    $routes->get('orders', 'Admin\Orders::index', ['as' => 'admin-orders']);
    $routes->get('customer', 'Admin\Customer::index', ['as' => 'admin-customer']);
    $routes->get('sales-report', 'Admin\SalesReport::index', ['as' => 'admin-sales-report']);
    $routes->get('account', 'Admin\AdminAccount::index', ['as' => 'admin-account']);
    $routes->get('users', 'Admin\Customer::index', ['as' => 'admin-users']);

});