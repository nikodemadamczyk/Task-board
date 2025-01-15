<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// $routes->setAutoRoute(false);

$routes->get('/', 'Home::index');

// $routes->get('tasks/test', 'Tasks::test');
// $routes->get('tasks/create', 'Tasks::create');
// $routes->post('tasks/store', 'Tasks::store');
// $routes->get('delete-task/(:num)', 'Tasks::delete/$1');

// $routes->get('view-debug-logs', 'Tasks::viewLogs');
