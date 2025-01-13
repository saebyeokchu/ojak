<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/brand', 'Brand::index');
$routes->get('/contract', 'Home::contract');
$routes->get('/personalinfo', 'Home::personalinfo');

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
$routes->get('/community/list/(:num)', 'Community::index/$1');
$routes->get('/community/new', 'Community::new');
$routes->get('/community/edit', 'Community::edit');
$routes->get('/community/detail', 'Community::detail');

//improve flickering
$routes->get('/community/notice', 'Community::notice');
$routes->get('/community/event', 'Community::event');
$routes->get('/community/qna', 'Community::qna');

// Auth
$routes->get('/auth', 'Auth::index');
$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/register-request-complete', 'Auth::registerRequestComplete');

$routes->post('/auth/verify', 'Auth::verify');
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
$routes->post('/setting/uploadDisplayGallery', 'Setting::uploadDisplayGallery');
$routes->post('/setting/deleteDisplayGallery', 'Setting::deleteDisplayGallery');
$routes->post('/setting/updateBusniessInfo', 'Setting::updateBusniessInfo');
$routes->post('/setting/insert', 'Setting::insert');
$routes->post('/setting/deleteBiz', 'Setting::deleteBiz');

// Api
$routes->post('/api/insertPost', 'Api::insertPost');
$routes->post('/api/deletePost', 'Api::deletePost');
$routes->post('/api/getById/(:id)', 'Api::getById/$1');
$routes->post('/api/getGalleryById', 'Api::getGalleryByIdAPI');
$routes->post('/api/deleteGallery', 'Api::deleteGallery');
$routes->get('/api/getBusniessInfo', 'Api::getBusniessInfo');
$routes->get('/api/getSocialInfo', 'Api::getSocialInfoJson');
$routes->post('/api/sendEmail', 'Api::sendEmail');
$routes->post('/api/insertEvent', 'Api::insertEvent');
$routes->post('/api/insertComment', 'Api::insertComment');
$routes->post('/api/deleteComment', 'Api::deleteComment');




