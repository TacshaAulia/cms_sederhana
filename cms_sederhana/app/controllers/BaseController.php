<?php
class BaseController {
    
    /**
     * Memuat view dan meneruskan data
     * @param string $viewName Nama file view (tanpa ekstensi .php)
     * @param array $data Data yang akan diteruskan ke view
     */
    public function view($viewName, $data = []) {
        // Extract data array menjadi variabel
        if (!empty($data)) {
            extract($data);
        }
        
        // Path ke file view
        $viewPath = APP_PATH . '/views/' . $viewName . '.php';
        
        // Cek apakah file view ada
        if (file_exists($viewPath)) {
            // Mulai output buffering untuk menangkap output
            ob_start();
            
            // Include file view
            require_once $viewPath;
            
            // Ambil konten dari buffer dan bersihkan
            $content = ob_get_clean();
            
            // Output konten
            echo $content;
        } else {
            // Error jika view tidak ditemukan
            $this->renderError('View not found: ' . $viewName);
        }
    }
    
    /**
     * Memuat model
     * @param string $modelName Nama model
     * @return object Instance model
     */
    public function model($modelName) {
        $modelPath = APP_PATH . '/models/' . $modelName . '.php';
        
        if (file_exists($modelPath)) {
            require_once $modelPath;
            return new $modelName();
        } else {
            $this->renderError('Model not found: ' . $modelName);
        }
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
     * Redirect kembali ke halaman sebelumnya
     */
    public function back() {
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
        $this->redirect($referer);
    }
    
    /**
     * Mengirim response JSON
     * @param mixed $data Data yang akan di-encode
     * @param int $statusCode HTTP status code
     */
    public function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
    
    /**
     * Mengirim response JSON error
     * @param string $message Pesan error
     * @param int $statusCode HTTP status code
     */
    public function jsonError($message, $statusCode = 400) {
        $this->json(['error' => $message], $statusCode);
    }
    
    /**
     * Mengirim response JSON success
     * @param mixed $data Data response
     * @param string $message Pesan sukses
     */
    public function jsonSuccess($data = null, $message = 'Success') {
        $response = ['success' => true, 'message' => $message];
        if ($data !== null) {
            $response['data'] = $data;
        }
        $this->json($response);
    }
    
    /**
     * Render halaman error
     * @param string $message Pesan error
     * @param int $statusCode HTTP status code
     */
    public function renderError($message, $statusCode = 404) {
        http_response_code($statusCode);
        
        $data = [
            'title' => 'Error ' . $statusCode,
            'message' => $message,
            'statusCode' => $statusCode
        ];
        
        $this->view('errors/error', $data);
    }
    
    /**
     * Mendapatkan data POST
     * @param string $key Key data (opsional)
     * @return mixed Data POST
     */
    public function getPost($key = null) {
        if ($key === null) {
            return $_POST;
        }
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }
    
    /**
     * Mendapatkan data GET
     * @param string $key Key data (opsional)
     * @return mixed Data GET
     */
    public function getGet($key = null) {
        if ($key === null) {
            return $_GET;
        }
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }
    
    /**
     * Validasi request method
     * @param string $method Method yang diharapkan (GET, POST, PUT, DELETE)
     * @return bool
     */
    public function isMethod($method) {
        return $_SERVER['REQUEST_METHOD'] === strtoupper($method);
    }
    
    /**
     * Cek apakah request adalah AJAX
     * @return bool
     */
    public function isAjax() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
               strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
    
    /**
     * Mendapatkan user agent
     * @return string
     */
    public function getUserAgent() {
        return $_SERVER['HTTP_USER_AGENT'] ?? '';
    }
    
    /**
     * Mendapatkan IP address client
     * @return string
     */
    public function getClientIp() {
        return $_SERVER['REMOTE_ADDR'] ?? '';
    }
} 