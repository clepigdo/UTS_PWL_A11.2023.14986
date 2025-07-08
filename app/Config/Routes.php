<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/',      'AuthController::login');
$routes->get('login',  'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::register');

// Dashboard spesifik per-role
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'DashboardController::admin');
    $routes->get('dashboard', 'DashboardController::dashboard');
    $routes->get('v_topup', 'DashboardController::v_topup');
    $routes->get('riwayat_pemesanan', 'DashboardController::riwayat_pemesanan');
    $routes->get('download', 'DashboardController::download');
    $routes->get('cek_pemesanan', 'DashboardController::cek_pemesanan');
    $routes->get('ulasan', 'ReviewController::index');
    $routes->post('ulasan/submit', 'ReviewController::submit');
});

$routes->group('user', ['filter' => 'auth'], function ($routes) {
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
$routes->group('topup_ml', function ($routes) {
    $routes->get('index',             'TopupMl::index');
    $routes->get('create',            'TopupMl::create');
    $routes->get('edit/(:num)',       'TopupMl::edit/$1');
    $routes->post('update/(:num)',    'TopupMl::update/$1');
    $routes->post('store',            'TopupMl::store');
    $routes->post('delete/(:num)',    'TopupMl::delete/$1');
    $routes->get('cekakun', 'TopupMl::cekAkun');
});

//Pembayaran Routes
$routes->group('payment', function ($routes) {
    $routes->get('process/(:num)',    'PaymentController::buatTransaksi/$1');
    $routes->post('notification',     'PaymentController::notification');
});

$routes->resource('api', ['controller' => 'apiController']);