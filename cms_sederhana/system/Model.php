<?php
class Model {
    protected $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function query($sql) {
        return $this->db->query($sql);
    }
    
    public function prepare($sql) {
        return $this->db->prepare($sql);
    }
    
    public function lastInsertId() {
        return $this->db->lastInsertId();
    }
} 