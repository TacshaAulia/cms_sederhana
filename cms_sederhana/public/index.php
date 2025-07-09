<?php
// Mulai session
session_start();

// Definisikan root path
define('ROOT', dirname(__DIR__));

define('APP_PATH', ROOT . '/app');
define('SYSTEM_PATH', ROOT . '/system');

// Autoload class sederhana
spl_autoload_register(function ($class) {
    $paths = [APP_PATH . '/controllers/', APP_PATH . '/models/', SYSTEM_PATH . '/'];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Load Router
require_once SYSTEM_PATH . '/Router.php';

// Inisialisasi Router
$router = new Router();

// Definisikan routes
$router->addRoute('', 'HomeController', 'index');
$router->addRoute('home', 'HomeController', 'index');
$router->addRoute('home/about', 'HomeController', 'about');

// Route untuk Article
$router->addRoute('article', 'ArticleController', 'index');
$router->addRoute('article/create', 'ArticleController', 'create');
$router->addRoute('article/search', 'ArticleController', 'search');
$router->addRouteWithParams('article/:id', 'ArticleController', 'show');
$router->addRouteWithParams('article/:id/edit', 'ArticleController', 'edit');
$router->addRouteWithParams('article/:id/delete', 'ArticleController', 'delete');

// Route dengan parameter
$router->addRouteWithParams('user/:id', 'UserController', 'show');
$router->addRouteWithParams('post/:id/edit', 'PostController', 'edit');

// Jalankan router
$router->dispatch(); 