<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/',      'AuthController::login');
$routes->get('login',  'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// Dashboard spesifik per-role
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'DashboardController::admin');
    $routes->get('dashboard', 'DashboardController::dashboard');
    $routes->get('v_topup', 'DashboardController::v_topup');
    $routes->get('riwayat_pemesanan', 'DashboardController::riwayat_pemesanan');
    $routes->get('download', 'DashboardController::download');
    $routes->get('cek_pemesanan', 'DashboardController::cek_pemesanan');
    $routes->get('ulasan', 'ReviewController::index');
    $routes->post('ulasan/submit', 'ReviewController::submit');
});

$routes->group('user', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'DashboardController::user');
    $routes->get('dashboard', 'DashboardController::dashboard');
    $routes->get('v_topup', 'DashboardController::v_topup');
    $routes->get('riwayat_pemesanan', 'DashboardController::riwayat_pemesanan');
    $routes->get('download', 'DashboardController::download');
    $routes->get('cek_pemesanan', 'DashboardController::cek_pemesanan');
    $routes->get('ulasan', 'ReviewController::index');
    $routes->post('ulasan/submit', 'ReviewController::submit');
});

// Topup Routes
$routes->get('/topup_ml/index', 'TopupMl::index');
$routes->get('/topup_ml/create', 'TopupMl::create');
$routes->get('topup_ml/edit/(:num)', 'TopupMl::edit/$1');
$routes->post('topup_ml/update/(:num)', 'TopupMl::update/$1');
$routes->post('/topup_ml/store', 'TopupMl::store');
$routes->post('topup_ml/delete/(:num)', 'TopupMl::delete/$1');

//Pembayaran Routes
$routes->get('payment/process/(:num)', 'PaymentController::buatTransaksi/$1');
$routes->post('payment/notification', 'PaymentController::notification');