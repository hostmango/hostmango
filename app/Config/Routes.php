<?php

namespace Config;

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
$routes->setDefaultController('GirisYap');
$routes->setDefaultMethod('Index');
$routes->setTranslateURIDashes(false);
$routes->set404Override('App\Controllers\Yonlendir::Index');
$routes->setAutoRoute(true);

/*
* --------------------------------------------------------------------
* Route Definitions
* --------------------------------------------------------------------
*/

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->add('/',				 						'GirisYap::Index');
$routes->add('CikisYap', 						'GirisYap::CikisYap');
$routes->add('OnBellekleriTemizle',	'Anasayfa::OnBellekleriTemizle');
$routes->add('KaranlikTema/(:any)',	'Anasayfa::KaranlikTema/$1');
$routes->add('Hata', 								'Yonlendir::Hata');
$routes->add('YetkisizErisim',			'Yonlendir::YetkisizErisim');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
