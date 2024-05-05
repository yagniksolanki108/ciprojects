<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('signals', 'Signal::index');
$routes->post("save-signals", "Signal::save"); 