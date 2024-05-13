<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dosen', 'Dosen::index');
$routes->get('/dosen/tambah', 'Dosen::tambah');
$routes->post('/dosen/save', 'Dosen::save');
$routes->get('/dosen/ubah/(:num)', 'Dosen::edit/$1');
$routes->post('/dosen/update/(:num)', 'Dosen::update/$1');
$routes->get('/dosen/hapus/(:num)', 'Dosen::hapus/$1');
$routes->get('/jabatan', 'Jabatan::index');
$routes->get('/jabatan/tambah', 'Jabatan::tambah');
$routes->post('/jabatan/save', 'Jabatan::save');
$routes->get('/jabatan/ubah/(:num)', 'Jabatan::edit/$1');
$routes->post('/jabatan/update/(:num)', 'Jabatan::update/$1');
$routes->get('/jabatan/hapus/(:num)', 'Jabatan::hapus/$1');
$routes->get('/petugas', 'Petugas::index');
$routes->get('/petugas/tambah', 'Petugas::tambah');
$routes->post('/petugas/save', 'Petugas::save');
$routes->get('/petugas/ubah/(:num)', 'Petugas::edit/$1');
$routes->post('/petugas/update/(:num)', 'Petugas::update/$1');
$routes->get('/petugas/hapus/(:num)', 'Petugas::hapus/$1');
$routes->get('/matkul', 'Matkul::index');
$routes->get('/matkul/tambah', 'Matkul::tambah');
$routes->post('/matkul/save', 'Matkul::save');
$routes->get('/matkul/ubah/(:num)', 'Matkul::edit/$1');
$routes->post('/matkul/update/(:num)', 'Matkul::update/$1');
$routes->get('/matkul/hapus/(:num)', 'Matkul::hapus/$1');
$routes->get('/users', 'Users::index');
$routes->get('/users/tambah', 'Users::tambah');
$routes->post('/users/save', 'Users::save');
$routes->get('/users/ubah/(:num)', 'Users::edit/$1');
$routes->post('/users/update/(:num)', 'Users::update/$1');
$routes->get('/users/hapus/(:num)', 'Users::hapus/$1');
$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');

