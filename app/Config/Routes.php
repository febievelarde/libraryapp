<?php namespace Config;

/**
 * --------------------------------------------------------------------
 * URI Routing
 * --------------------------------------------------------------------
 * This file lets you re-map URI requests to specific controller functions.
 *
 * Typically there is a one-to-one relationship between a URL string
 * and its corresponding controller class/method. The segments in a
 * URL normally follow this pattern:
 *
 *    example.com/class/method/id
 *
 * In some instances, however, you may want to remap this relationship
 * so that a different class/function is called than the one
 * corresponding to the URL.
 */

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

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
 * The RouteCollection object allows you to modify the way that the
 * Router works, by acting as a holder for it's configuration settings.
 * The following methods can be called on the object to modify
 * the default operations.
 *
 *    $routes->defaultNamespace()
 *
 * Modifies the namespace that is added to a controller if it doesn't
 * already have one. By default this is the global namespace (\).
 *
 *    $routes->defaultController()
 *
 * Changes the name of the class used as a controller when the route
 * points to a folder instead of a class.
 *
 *    $routes->defaultMethod()
 *
 * Assigns the method inside the controller that is ran when the
 * Router is unable to determine the appropriate method to run.
 *
 *    $routes->setAutoRoute()
 *
 * Determines whether the Router will attempt to match URIs to
 * Controllers when no specific route has been defined. If false,
 * only routes that have been defined here will be available.
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
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
$routes->get('/', 'Home::index');
$routes->match(['get','post'], 'admin/login', 'Admins::login');
$routes->get('/admin/logout', 'Admins::logout');

// Courses
$routes->get('/admin/courses', 'Courses::index');
$routes->match(['get','post'], '/admin/courses/create', 'Courses::create');
$routes->get('/admin/courses/destroy/(:any)', 'Courses::destroy/$1');
$routes->match(['get','post'], '/admin/courses/edit/(:any)', 'Courses::edit/$1');

// Course Years
$routes->get('/admin/course_years', 'CourseYears::index');
$routes->match(['get','post'], '/admin/course_years/create', 'CourseYears::create');
$routes->get('/admin/course_years/destroy/(:any)', 'CourseYears::destroy/$1');
$routes->match(['get','post'], '/admin/course_years/edit/(:any)', 'CourseYears::edit/$1');

// Students
$routes->get('/admin/students', 'Students::index');
$routes->match(['get','post'], '/admin/students/create', 'Students::create');
$routes->get('/admin/students/destroy/(:any)', 'Students::destroy/$1');
$routes->match(['get','post'], '/admin/students/edit/(:any)', 'Students::edit/$1');

// Books
$routes->get('/admin/books', 'Books::index');
$routes->match(['get','post'], '/admin/books/create', 'Books::create');
$routes->get('/admin/books/destroy/(:any)', 'Books::destroy/$1');
$routes->match(['get','post'], '/admin/books/edit/(:any)', 'Books::edit/$1');

// Fines
$routes->get('/admin/fines', 'Fines::index');
$routes->match(['get','post'], '/admin/fines/create', 'Fines::create');
$routes->get('/admin/fines/destroy/(:any)', 'Fines::destroy/$1');
$routes->match(['get','post'], '/admin/fines/edit/(:any)', 'Fines::edit/$1');

// Borrowed Books
$routes->get('/admin/borrowed_books', 'BorrowedBooks::index');
$routes->match(['get','post'], '/admin/borrowed_books/create', 'BorrowedBooks::create');
$routes->get('/admin/borrowed_books/destroy/(:any)', 'BorrowedBooks::destroy/$1');
$routes->match(['get','post'], '/admin/borrowed_books/edit/(:any)', 'BorrowedBooks::edit/$1');
$routes->get('/admin/borrowed_books/return/(:any)', 'BorrowedBooks::return_book/$1');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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
