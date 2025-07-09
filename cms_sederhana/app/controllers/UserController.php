<?php
class UserController extends BaseController {
    
    public function index() {
        $data = [
            'title' => 'User List',
            'message' => 'Daftar semua user'
        ];
        
        $this->view('user/index', $data);
    }
    
    public function show($id) {
        $data = [
            'title' => 'User Detail',
            'message' => 'Detail user dengan ID: ' . $id,
            'user_id' => $id
        ];
        
        $this->view('user/show', $data);
    }
    
    public function create() {
        $data = [
            'title' => 'Create User',
            'message' => 'Form untuk membuat user baru'
        ];
        
        $this->view('user/create', $data);
    }
    
    public function edit($id) {
        $data = [
            'title' => 'Edit User',
            'message' => 'Form untuk mengedit user dengan ID: ' . $id,
            'user_id' => $id
        ];
        
        $this->view('user/edit', $data);
    }
} 