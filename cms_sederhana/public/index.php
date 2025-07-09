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

// Jalankan aplikasi (Router sederhana)
require_once SYSTEM_PATH . '/App.php';
$app = new App(); 