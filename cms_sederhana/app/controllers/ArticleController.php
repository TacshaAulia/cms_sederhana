<?php
class ArticleController extends BaseController {
    
    public function index() {
        // Menggunakan model Article untuk mengambil data
        $articleModel = $this->model('Article');
        $articles = $articleModel->getAll();
        $totalArticles = $articleModel->count();
        
        $data = [
            'title' => 'Daftar Artikel',
            'articles' => $articles,
            'total_articles' => $totalArticles
        ];
        
        $this->view('article/index', $data);
    }
    
    public function show($id) {
        // Menggunakan model Article untuk mengambil data berdasarkan ID
        $articleModel = $this->model('Article');
        $article = $articleModel->getById($id);
        
        if (!$article) {
            $this->renderError('Artikel tidak ditemukan', 404);
            return;
        }
        
        $data = [
            'title' => $article['title'],
            'article' => $article
        ];
        
        $this->view('article/show', $data);
    }
    
    public function create() {
        if ($this->isMethod('POST')) {
            // Handle form submission
            $title = $this->getPost('title');
            $content = $this->getPost('content');
            
            // Validasi sederhana
            if (empty($title) || empty($content)) {
                $this->jsonError('Title dan content harus diisi');
            }
            
            // Menggunakan model Article untuk menyimpan data
            $articleModel = $this->model('Article');
            $data = [
                'title' => $title,
                'content' => $content
            ];
            
            if ($articleModel->create($data)) {
                $this->jsonSuccess(['title' => $title], 'Artikel berhasil dibuat');
            } else {
                $this->jsonError('Gagal membuat artikel');
            }
        }
        
        $data = [
            'title' => 'Buat Artikel Baru'
        ];
        
        $this->view('article/create', $data);
    }
    
    public function edit($id) {
        $articleModel = $this->model('Article');
        
        if ($this->isMethod('POST')) {
            // Handle form submission untuk update
            $title = $this->getPost('title');
            $content = $this->getPost('content');
            
            if (empty($title) || empty($content)) {
                $this->jsonError('Title dan content harus diisi');
            }
            
            $data = [
                'title' => $title,
                'content' => $content
            ];
            
            if ($articleModel->update($id, $data)) {
                $this->jsonSuccess(['id' => $id], 'Artikel berhasil diupdate');
            } else {
                $this->jsonError('Gagal mengupdate artikel');
            }
        }
        
        // Ambil data artikel yang akan diedit
        $article = $articleModel->getById($id);
        
        if (!$article) {
            $this->renderError('Artikel tidak ditemukan', 404);
            return;
        }
        
        $data = [
            'title' => 'Edit Artikel',
            'article' => $article
        ];
        
        $this->view('article/edit', $data);
    }
    
    public function delete($id) {
        $articleModel = $this->model('Article');
        
        if ($this->isMethod('POST')) {
            if ($articleModel->delete($id)) {
                $this->jsonSuccess(['id' => $id], 'Artikel berhasil dihapus');
            } else {
                $this->jsonError('Gagal menghapus artikel');
            }
        }
        
        // Ambil data artikel yang akan dihapus untuk konfirmasi
        $article = $articleModel->getById($id);
        
        if (!$article) {
            $this->renderError('Artikel tidak ditemukan', 404);
            return;
        }
        
        $data = [
            'title' => 'Hapus Artikel',
            'article' => $article
        ];
        
        $this->view('article/delete', $data);
    }
    
    public function search() {
        $keyword = $this->getGet('q');
        
        if (empty($keyword)) {
            $this->redirect('/article');
        }
        
        // Menggunakan model Article untuk pencarian
        $articleModel = $this->model('Article');
        $articles = $articleModel->search($keyword);
        
        $data = [
            'title' => 'Hasil Pencarian: ' . $keyword,
            'articles' => $articles,
            'keyword' => $keyword,
            'total_results' => count($articles)
        ];
        
        $this->view('article/search', $data);
    }
} 