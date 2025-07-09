<?php
class Router {
    private $routes = [];
    private $defaultController = 'HomeController';
    private $defaultMethod = 'index';
    
    public function __construct() {
        // Set default route
        $this->addRoute('', $this->defaultController, $this->defaultMethod);
    }
    
    /**
     * Menambahkan route baru
     * @param string $path Path URL
     * @param string $controller Nama controller
     * @param string $method Nama method
     */
    public function addRoute($path, $controller, $method = 'index') {
        $this->routes[$path] = [
            'controller' => $controller,
            'method' => $method
        ];
    }
    
    /**
     * Menambahkan route dengan parameter
     * @param string $pattern Pattern URL dengan parameter
     * @param string $controller Nama controller
     * @param string $method Nama method
     */
    public function addRouteWithParams($pattern, $controller, $method = 'index') {
        $this->routes[$pattern] = [
            'controller' => $controller,
            'method' => $method,
            'hasParams' => true
        ];
    }
    
    /**
     * Mendapatkan URL saat ini
     * @return string
     */
    public function getCurrentUrl() {
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        return rtrim($url, '/');
    }
    
    /**
     * Parse URL menjadi array
     * @return array
     */
    public function parseUrl() {
        $url = $this->getCurrentUrl();
        if (empty($url)) {
            return [];
        }
        return explode('/', filter_var($url, FILTER_SANITIZE_URL));
    }
    
    /**
     * Mencari route yang cocok
     * @param string $path Path yang dicari
     * @return array|null
     */
    private function findRoute($path) {
        // Cek exact match
        if (isset($this->routes[$path])) {
            return $this->routes[$path];
        }
        
        // Cek route dengan parameter
        foreach ($this->routes as $pattern => $route) {
            if (isset($route['hasParams']) && $route['hasParams']) {
                $patternParts = explode('/', $pattern);
                $pathParts = explode('/', $path);
                
                if (count($patternParts) === count($pathParts)) {
                    $match = true;
                    $params = [];
                    
                    for ($i = 0; $i < count($patternParts); $i++) {
                        if (strpos($patternParts[$i], ':') === 0) {
                            // Ini adalah parameter
                            $paramName = substr($patternParts[$i], 1);
                            $params[$paramName] = $pathParts[$i];
                        } elseif ($patternParts[$i] !== $pathParts[$i]) {
                            $match = false;
                            break;
                        }
                    }
                    
                    if ($match) {
                        $route['params'] = $params;
                        return $route;
                    }
                }
            }
        }
        
        return null;
    }
    
    /**
     * Dispatch request ke controller yang sesuai
     */
    public function dispatch() {
        $url = $this->getCurrentUrl();
        $urlParts = $this->parseUrl();
        
        // Coba cari route yang sudah didefinisikan
        $route = $this->findRoute($url);
        
        if ($route) {
            $controllerName = $route['controller'];
            $methodName = $route['method'];
            $params = isset($route['params']) ? $route['params'] : [];
        } else {
            // Fallback ke routing otomatis berdasarkan URL
            $controllerName = isset($urlParts[0]) && !empty($urlParts[0]) 
                ? ucfirst($urlParts[0]) . 'Controller' 
                : $this->defaultController;
            $methodName = isset($urlParts[1]) ? $urlParts[1] : $this->defaultMethod;
            $params = array_slice($urlParts, 2);
        }
        
        // Cek apakah controller file ada
        $controllerFile = APP_PATH . '/controllers/' . $controllerName . '.php';
        if (!file_exists($controllerFile)) {
            $this->handleError('Controller not found: ' . $controllerName);
            return;
        }
        
        // Load controller
        require_once $controllerFile;
        
        // Cek apakah class controller ada
        if (!class_exists($controllerName)) {
            $this->handleError('Controller class not found: ' . $controllerName);
            return;
        }
        
        // Instantiate controller
        $controller = new $controllerName();
        
        // Cek apakah method ada
        if (!method_exists($controller, $methodName)) {
            $this->handleError('Method not found: ' . $controllerName . '::' . $methodName);
            return;
        }
        
        // Panggil method dengan parameter
        call_user_func_array([$controller, $methodName], $params);
    }
    
    /**
     * Handle error
     * @param string $message Pesan error
     */
    private function handleError($message) {
        http_response_code(404);
        echo '<h1>404 - Page Not Found</h1>';
        echo '<p>' . htmlspecialchars($message) . '</p>';
        echo '<p><a href="/">Back to Home</a></p>';
    }
    
    /**
     * Redirect ke URL lain
     * @param string $url URL tujuan
     */
    public function redirect($url) {
        header('Location: ' . $url);
        exit();
    }
    
    /**
     * Generate URL untuk route
     * @param string $controller Nama controller
     * @param string $method Nama method
     * @param array $params Parameter
     * @return string
     */
    public function generateUrl($controller, $method = 'index', $params = []) {
        $url = '/' . strtolower(str_replace('Controller', '', $controller));
        if ($method !== 'index') {
            $url .= '/' . $method;
        }
        
        if (!empty($params)) {
            $url .= '/' . implode('/', $params);
        }
        
        return $url;
    }
} 