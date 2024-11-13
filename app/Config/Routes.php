<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/brand', 'Brand::index');
$routes->get('/gallery', 'Gallery::index');
$routes->get('/gallery/:num', 'Gallery::detail/$1');
$routes->get('/community', 'Community::index');


