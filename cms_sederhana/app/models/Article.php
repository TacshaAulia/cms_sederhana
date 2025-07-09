<?php
class Article extends Model {
    
    protected $table = 'articles';
    protected $primaryKey = 'id';
    
    /**
     * Mengambil semua artikel dari database
     * @return array Array artikel
     */
    public function getAll() {
        try {
            $sql = "SELECT id, title, content, created_at FROM {$this->table} ORDER BY created_at DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Jika tabel belum ada, return data dummy untuk demo
            return $this->getDummyData();
        }
    }
    
    /**
     * Mengambil artikel berdasarkan ID
     * @param int $id ID artikel
     * @return array|null Data artikel atau null jika tidak ditemukan
     */
    public function getById($id) {
        try {
            $sql = "SELECT id, title, content, created_at FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Return dummy data untuk demo
            return $this->getDummyArticleById($id);
        }
    }
    
    /**
     * Menyimpan artikel baru
     * @param array $data Data artikel (title, content)
     * @return bool True jika berhasil
     */
    public function create($data) {
        try {
            $sql = "INSERT INTO {$this->table} (title, content, created_at) VALUES (:title, :content, :created_at)";
            $stmt = $this->db->prepare($sql);
            
            $created_at = date('Y-m-d H:i:s');
            
            $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
            $stmt->bindParam(':content', $data['content'], PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
    
    /**
     * Mengupdate artikel
     * @param int $id ID artikel
     * @param array $data Data yang akan diupdate
     * @return bool True jika berhasil
     */
    public function update($id, $data) {
        try {
            $sql = "UPDATE {$this->table} SET title = :title, content = :content WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            
            $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
            $stmt->bindParam(':content', $data['content'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
    
    /**
     * Menghapus artikel
     * @param int $id ID artikel
     * @return bool True jika berhasil
     */
    public function delete($id) {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
    
    /**
     * Mencari artikel berdasarkan keyword
     * @param string $keyword Keyword pencarian
     * @return array Array artikel yang cocok
     */
    public function search($keyword) {
        try {
            $sql = "SELECT id, title, content, created_at FROM {$this->table} 
                    WHERE title LIKE :keyword OR content LIKE :keyword 
                    ORDER BY created_at DESC";
            $stmt = $this->db->prepare($sql);
            
            $searchKeyword = "%{$keyword}%";
            $stmt->bindParam(':keyword', $searchKeyword, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Return dummy data untuk demo
            return $this->getDummySearchData($keyword);
        }
    }
    
    /**
     * Menghitung total artikel
     * @return int Total artikel
     */
    public function count() {
        try {
            $sql = "SELECT COUNT(*) as total FROM {$this->table}";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return (int) $result['total'];
        } catch (PDOException $e) {
            return count($this->getDummyData());
        }
    }
    
    /**
     * Data dummy untuk demo (jika tabel belum ada)
     * @return array
     */
    private function getDummyData() {
        return [
            [
                'id' => 1,
                'title' => 'Pengenalan Framework MVC',
                'content' => 'Framework MVC adalah pola arsitektur yang memisahkan aplikasi menjadi tiga komponen utama: Model, View, dan Controller. Model menangani data dan logika bisnis, View menampilkan data kepada pengguna, dan Controller mengatur alur aplikasi.',
                'created_at' => '2024-01-15 10:30:00'
            ],
            [
                'id' => 2,
                'title' => 'Cara Membuat Router Sederhana',
                'content' => 'Router adalah komponen penting dalam framework yang menangani routing URL. Router ini akan memetakan URL ke controller dan method yang sesuai. Dalam implementasi sederhana, router dapat membaca URL dan memisahkannya menjadi controller, method, dan parameter.',
                'created_at' => '2024-01-16 14:20:00'
            ],
            [
                'id' => 3,
                'title' => 'Implementasi BaseController',
                'content' => 'BaseController menyediakan method-method umum yang bisa digunakan oleh semua controller. Method view() untuk memuat file view, method model() untuk memuat model, method redirect() untuk redirect, dan method-method helper lainnya.',
                'created_at' => '2024-01-17 09:15:00'
            ],
            [
                'id' => 4,
                'title' => 'Membuat Model Database',
                'content' => 'Model adalah komponen yang menangani interaksi dengan database. Model berisi method-method untuk mengambil, menyimpan, mengupdate, dan menghapus data. Model juga dapat berisi logika bisnis yang terkait dengan data.',
                'created_at' => '2024-01-18 16:45:00'
            ],
            [
                'id' => 5,
                'title' => 'Penerapan MVC di PHP',
                'content' => 'PHP adalah bahasa pemrograman yang sangat fleksibel untuk menerapkan pola MVC. Dengan PHP, kita dapat membuat framework MVC sederhana yang mudah dipahami dan dikembangkan. Framework ini dapat menjadi dasar untuk aplikasi yang lebih kompleks.',
                'created_at' => '2024-01-19 11:30:00'
            ]
        ];
    }
    
    /**
     * Data dummy artikel berdasarkan ID
     * @param int $id ID artikel
     * @return array|null
     */
    private function getDummyArticleById($id) {
        $articles = $this->getDummyData();
        
        foreach ($articles as $article) {
            if ($article['id'] == $id) {
                return $article;
            }
        }
        
        return null;
    }
    
    /**
     * Data dummy untuk pencarian
     * @param string $keyword Keyword pencarian
     * @return array
     */
    private function getDummySearchData($keyword) {
        $articles = $this->getDummyData();
        $results = [];
        
        foreach ($articles as $article) {
            if (stripos($article['title'], $keyword) !== false || 
                stripos($article['content'], $keyword) !== false) {
                $results[] = $article;
            }
        }
        
        return $results;
    }
} 