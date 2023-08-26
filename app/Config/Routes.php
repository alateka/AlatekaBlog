<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// DEFAULT REDIRECT
$routes->addRedirect('/', 'index.php/en/home');

// -------------------------------------------------------------------

// HOME
$routes->get('/{locale}/home', 'MainController', [
  'as' => 'home'
]);

// -------------------------------------------------------------------

// DASHBOARD
$routes->get('/{locale}/dashboard', 'DashboardController', [
  'as' => 'dashboard'
]);

// -------------------------------------------------------------------

// POSTS
$routes->get('/{locale}/post', 'PostController', [
  'as' => 'post'
]);
$routes->post('/{locale}/post', 'PostController::store', [
  'as' => 'post'
]);
$routes->get('/{locale}/post/(:num)', 'PostController::show/$1', [
  'as' => 'show_post'
]);

// -------------------------------------------------------------------

// LOGIN
$routes->get('/{locale}/login', 'LoginController', [
  'as' => 'login'
]);
$routes->post('/{locale}/login', 'LoginController::login', [
  'as' => 'login'
]);
$routes->get('/{locale}/logout', 'LoginController::logout', [
  'as' => 'logout'
]);

// -------------------------------------------------------------------

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
