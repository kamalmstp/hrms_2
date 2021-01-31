<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('logout', 'Login::logout');
// Admin
$routes->get('admin', 'Admin::index',['filter' => 'auth']);
$routes->get('data_pegawai', 'Admin::data_pegawai',['filter' => 'auth']);
$routes->get('add_pegawai', 'Admin::add_pegawai',['filter' => 'auth']);
$routes->post('save_pegawai', 'Admin::save_pegawai',['filter' => 'auth']);
//Master Data
$routes->get('data_jabatan', 'Admin::data_jabatan',['filter' => 'auth']);
$routes->post('save_jabatan', 'Admin::save_jabatan',['filter' => 'auth']);
$routes->post('update_jabatan', 'Admin::update_jabatan',['filter' => 'auth']);
$routes->post('del_jabatan', 'Admin::del_jabatan', ['filter' => 'auth']);
$routes->get('data_bidang', 'Admin::data_bidang',['filter' => 'auth']);
$routes->post('save_bidang', 'Admin::save_bidang',['filter' => 'auth']);
$routes->post('update_bidang', 'Admin::update_bidang',['filter' => 'auth']);
$routes->post('del_bidang', 'Admin::del_bidang', ['filter' => 'auth']);
$routes->get('data_periode', 'Admin::data_periode',['filter' => 'auth']);
$routes->post('save_periode', 'Admin::save_periode',['filter' => 'auth']);
$routes->post('update_periode', 'Admin::update_periode',['filter' => 'auth']);
$routes->post('del_periode', 'Admin::del_periode', ['filter' => 'auth']);
/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
