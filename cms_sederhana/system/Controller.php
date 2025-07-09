<?php
class Controller {
    public function model($model) {
        require_once APP_PATH . '/models/' . $model . '.php';
        return new $model();
    }
    
    public function view($view, $data = []) {
        if (file_exists(APP_PATH . '/views/' . $view . '.php')) {
            extract($data);
            require_once APP_PATH . '/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
    
    public function redirect($url) {
        header('Location: ' . $url);
        exit();
    }
    
    public function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
} 