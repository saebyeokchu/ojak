<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/brand', 'Brand::index');

// Gallery
$routes->get('/gallery', 'Gallery::index');
$routes->get('/gallery/new', 'Gallery::new');
$routes->post('/gallery/insert', 'Gallery::insert');
$routes->get('/gallery/(:num)', 'Gallery::detail/$1');

// Coummunity
$routes->get('/community/(:num)', 'Community::index/$1');
$routes->get('/community/new', 'Community::new');
$routes->get('/community/edit/(:num)', 'Community::edit/$1');
$routes->get('/community/detail/(:num)/(:num)', 'Community::detail/$1/$2');

// Api
$routes->post('/api/insertPost', 'Api::insertPost');
$routes->post('/api/deletePost', 'Api::deletePost');
$routes->post('/api/getById/(:id)', 'Api::getById/$1');

// Auth
$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->post('/auth/register', 'Auth::register');


