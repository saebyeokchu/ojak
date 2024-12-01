<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/brand', 'Brand::index');

//My
$routes->get('/my/(:any)', 'My::index/$1');
$routes->post('/business/edit', 'My::editBusiness');

// Gallery
$routes->get('/gallery', 'Gallery::index');
$routes->get('/gallery/new', 'Gallery::new');
$routes->post('/gallery/insert', 'Gallery::insert');
$routes->post('/gallery/deleteByGalleryId', 'Gallery::deleteByGalleryId');
$routes->post('/gallery/updateByGalleryId', 'Gallery::updateByGalleryId');
$routes->post('/gallery/uploadRepresentItems', 'Gallery::uploadRepresentItems');
$routes->get('/gallery/(:num)', 'Gallery::detail/$1');
$routes->get('/gallery/edit/(:num)', 'Gallery::edit/$1');

// Coummunity
$routes->get('/community/(:num)', 'Community::index/$1');
$routes->get('/community/new', 'Community::new');
$routes->get('/community/edit/(:num)', 'Community::edit/$1');
$routes->get('/community/detail/(:num)/(:num)', 'Community::detail/$1/$2');

// Auth
$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->post('/auth/register', 'Auth::register');
$routes->post('/auth/update', 'Auth::update');
$routes->post('/auth/check', 'Auth::check');
$routes->post('/auth/approve', 'Auth::approve');
$routes->post('/auth/disapprove', 'Auth::disapprove');
$routes->get('/auth/mailAuth', 'Auth::mailAuth');
$routes->post('/auth/unsubscribe', 'Auth::unsubscribe');
$routes->post('/auth/emailAuth', 'Auth::emailAuth');
$routes->post('/auth/sendAuthEmail', 'Auth::sendAuthEmail');
$routes->post('/auth/checkAuthEmail', 'Auth::checkAuthEmail');

// Setting
$routes->post('/setting/uploadNotice', 'Setting::uploadNotice');


// Api
$routes->post('/api/insertPost', 'Api::insertPost');
$routes->post('/api/deletePost', 'Api::deletePost');
$routes->post('/api/getById/(:id)', 'Api::getById/$1');
$routes->post('/api/deleteGallery', 'Api::deleteGallery');
$routes->get('/api/getBusniessInfo', 'Api::getBusniessInfo');
$routes->post('/api/sendEmail', 'Api::sendEmail');



