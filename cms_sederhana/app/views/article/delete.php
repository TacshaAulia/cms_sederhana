<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .warning {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        .article-info {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .article-title {
            font-size: 1.1em;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .article-meta {
            color: #666;
            font-size: 0.9em;
        }
        .actions {
            text-align: center;
            margin: 30px 0;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 10px;
            transition: background 0.3s;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-danger {
            background: #dc3545;
        }
        .btn-danger:hover {
            background: #c82333;
        }
        .btn-secondary {
            background: #6c757d;
        }
        .btn-secondary:hover {
            background: #5a6268;
        }
        .btn-success {
            background: #28a745;
        }
        .btn-success:hover {
            background: #218838;
        }
        .form-delete {
            display: inline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= $title ?></h1>
        
        <div class="warning">
            <strong>⚠️ Peringatan!</strong> Anda akan menghapus artikel ini secara permanen. Tindakan ini tidak dapat dibatalkan.
        </div>
        
        <div class="article-info">
            <div class="article-title"><?= htmlspecialchars($article['title']) ?></div>
            <div class="article-meta">
                ID: <?= $article['id'] ?> | 
                Dibuat: <?= date('d/m/Y H:i', strtotime($article['created_at'])) ?>
            </div>
        </div>
        
        <div class="actions">
            <form method="POST" class="form-delete">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                    Ya, Hapus Artikel
                </button>
            </form>
            
            <a href="/article/<?= $article['id'] ?>" class="btn btn-secondary">Batal</a>
            <a href="/article" class="btn btn-success">Kembali ke Daftar</a>
        </div>
    </div>
</body>
</html> 