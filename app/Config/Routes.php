<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//AUTH
$routes->get('/', 'SiswaController::index');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');


//Siswa
$routes->get('/siswa','SiswaController::index');
$routes->post('/siswa/editdata','SiswaController::editdata');
$routes->post('/siswa/createsave','SiswaController::createsave');
$routes->post('/siswa/editsave','SiswaController::editsave');
$routes->post('/siswa/delete','SiswaController::delete');

//Kelas
$routes->get('/kelas','KelasController::index');
$routes->post('/kelas/editdata','KelasController::editdata');
$routes->post('/kelas/createsave','KelasController::createsave');
$routes->post('/kelas/editsave','KelasController::editsave');
$routes->post('/kelas/delete','KelasController::delete');


//Manage Siswa
$routes->get('/manage','ManageController::index');
$routes->post('/manage/createsave','ManageController::createsave');
$routes->post('/manage/editdata','ManageController::editdata');
$routes->post('/manage/editsave','ManageController::editsave');
$routes->post('/manage/delete','ManageController::delete');

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
