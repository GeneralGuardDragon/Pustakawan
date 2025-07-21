<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
# $routes->get('/', 'Home::index');

$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::process');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::store');
$routes->get('auth/logout', 'Auth::logout');



$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/unauthorized', 'Home::unauthorized');

// Role Admin dan Petugas untuk crud buku
$routes->group('', ['filter' => 'rolecheck:admin,petugas'], function($routes) {
    $routes->get('/buku', 'Buku::index');
    $routes->get('/buku/create', 'Buku::create');
    $routes->post('/buku/store', 'Buku::store');
    $routes->get('/buku/edit/(:num)', 'Buku::edit/$1');
    $routes->post('/buku/update/(:num)', 'Buku::update/$1');
    $routes->get('/buku/delete/(:num)', 'Buku::delete/$1');
    $routes->get('/buku',               'Buku::index');
    $routes->get('/buku/create',        'Buku::create');
    $routes->post('/buku/store',        'Buku::store');
    $routes->get('/buku/edit/(:num)',   'Buku::edit/$1');
    $routes->post('/buku/update/(:num)','Buku::update/$1');

});

// Role Admin Untuk crud user
$routes->group('', ['filter' => 'rolecheck:admin'], function ($routes) {
    $routes->get('/user',             'User::index');
    $routes->get('/user/create',      'User::create');
    $routes->post('/user/store',      'User::store');
    $routes->get('/user/edit/(:num)', 'User::edit/$1');
    $routes->post('/user/update/(:num)', 'User::update/$1');
    $routes->get('/user/delete/(:num)', 'User::delete/$1');
});

// Role Admin dan petugas untuk Crud Peminjaman
$routes->group('', ['filter' => 'rolecheck:admin,petugas'], function ($routes) {
    $routes->get ('/peminjaman',               'Peminjaman::index');
    $routes->get ('/peminjaman/create',        'Peminjaman::create');
    $routes->post('/peminjaman/store',         'Peminjaman::store');
    $routes->get ('/peminjaman/edit/(:num)',   'Peminjaman::edit/$1');
    $routes->post('/peminjaman/update/(:num)', 'Peminjaman::update/$1');
    $routes->get ('/peminjaman/delete/(:num)', 'Peminjaman::delete/$1');
});


// Role pengunjung
$routes->group('', ['filter' => 'rolecheck:pengunjung'], function ($routes) {
    $routes->get('/pengunjung/buku',               'Pengunjung::buku');
    $routes->get('/pengunjung/buku/booking/(:num)','Pengunjung::booking/$1');
    $routes->get('/pengunjung/buku/cancel/(:num)', 'Pengunjung::cancel/$1');
    $routes->get('/pengunjung/history',            'Pengunjung::history');
});




