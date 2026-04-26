<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/prodi/(:any)', 'Prodi::detail/$1');

$routes->get('/faculty', 'Page::fakultas');
$routes->get('/profil', 'Kerjasama::index');
$routes->get('/sambutan', 'Profil::sambutan');
$routes->get('/sejarah', 'Profil::sejarah');
$routes->get('visi-misi', 'Profil::visiMisi');
$routes->get('/news', 'News::index');
$routes->get('/news/(:any)', 'News::detail/$1');

$routes->get('/4dm1n', 'Auth::index');
$routes->post('/4dm1n', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/createdAdmin', 'Auth::createAdmin');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    $routes->get('news', 'Admin::index');
    $routes->get('news/create', 'Admin::create');
    $routes->post('news/store', 'Admin::store');
    $routes->get('news/edit/(:num)', 'Admin::edit/$1');
    $routes->post('news/update/(:num)', 'Admin::update/$1');
    $routes->get('news/delete/(:num)', 'Admin::delete/$1');
    $routes->get('news/publish/(:num)', 'Admin::publish/$1');
    $routes->get('news/unpublish/(:num)', 'Admin::unpublish/$1');

    // Fakultas
    $routes->get('fakultas', 'Admin::fakultas');
    $routes->post('fakultas/store', 'Admin::storeFakultas');
    $routes->get('fakultas/delete/(:num)', 'faculty::deleteFakultas/$1');
    $routes->get('fakultas/create', 'Faculty::create');
    $routes->post('admin/fakultas/update/(:num)', 'Admin::updateFakultas/$1');

    // Prodi
    $routes->get('prodi', 'Prodi::prodi');
    $routes->post('prodi/store', 'Prodi::storeProdi');
    $routes->get('prodi/delete/(:num)', 'Prodi::deleteProdi/$1');
    $routes->get('prodi/create', 'Prodi::create');
    $routes->get('prodi/edit/(:num)', 'Prodi::edit/$1');
    $routes->post('prodi/update/(:num)', 'Prodi::update/$1');

    // Kerjasama
    $routes->get('kerjasama/create', 'Kerjasama::createKerjasama');
    $routes->post('kerjasama/store', 'Kerjasama::storeKerjasama');
    $routes->get('kerjasama/delete/(:num)', 'Kerjasama::deleteKerjasama/$1');
    $routes->post('admin/kerjasama/update/(:num)', 'Kerjasama::updateKerjasama/$1');

    // Profil
    $routes->get('admin/profil', 'Admin::profil');
    $routes->post('admin/profil/update', 'Admin::updateSejarah');
    $routes->post('admin/visi/update', 'Admin::updateVisi');

    $routes->post('admin/misi/add', 'Admin::addMisi');
    $routes->get('admin/misi/delete/(:num)', 'Admin::deleteMisi/$1');
    $routes->post('misi/update/(:num)', 'Admin::updateMisi/$1');

    $routes->post('admin/sambutan/update', 'Admin::updateSambutan');

    $routes->post('admin/fasilitas/update', 'Admin::updateFasilitas');
});
