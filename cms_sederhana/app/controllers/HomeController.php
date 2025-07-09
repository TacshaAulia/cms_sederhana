<?php
class HomeController extends Controller {
    public function index() {
        $data = [
            'title' => 'CMS Sederhana - Home',
            'message' => 'Selamat datang di CMS Sederhana dengan Framework MVC'
        ];
        
        $this->view('home/index', $data);
    }
    
    public function about() {
        $data = [
            'title' => 'CMS Sederhana - About',
            'message' => 'Halaman About CMS Sederhana'
        ];
        
        $this->view('home/about', $data);
    }
} 