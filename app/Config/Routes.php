<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/',      'AuthController::login');
$routes->get('login',  'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');


// Dashboard spesifik per-role
$routes->get('admin',  'DashboardController::admin', ['filter' => 'auth']);
$routes->get('/admin/dashboard', 'DashboardController::dashboard', ['filter' => 'auth']);
$routes->get('/admin/v_topup', 'DashboardController::v_topup', ['filter' => 'auth']);
$routes->get('/admin/riwayat_pemesanan', 'DashboardController::riwayat_pemesanan', ['filter' => 'auth']);
$routes->get('/admin/cek_pemesanan', 'DashboardController::cek_pemesanan', ['filter' => 'auth']);



$routes->get('user',   'DashboardController::user', ['filter' => 'auth']);
$routes->get('/user/dashboard', 'DashboardController::dashboard', ['filter' => 'auth']);
$routes->get('/user/v_topup', 'DashboardController::v_topup', ['filter' => 'auth']);
$routes->get('/user/riwayat_pemesanan', 'DashboardController::riwayat_pemesanan', ['filter' => 'auth']);
$routes->get('/user/cek_pemesanan', 'DashboardController::cek_pemesanan', ['filter' => 'auth']);

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

