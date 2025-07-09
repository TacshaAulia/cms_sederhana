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
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .stats {
            background: #e8f5e8;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            border-left: 4px solid #4CAF50;
        }
        .article-list {
            display: grid;
            gap: 20px;
        }
        .article-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background: #fafafa;
            transition: transform 0.2s;
        }
        .article-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .article-title {
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .article-title a {
            color: #2196F3;
            text-decoration: none;
        }
        .article-title a:hover {
            text-decoration: underline;
        }
        .article-meta {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 10px;
        }
        .article-content {
            color: #555;
            line-height: 1.5;
        }
        .actions {
            text-align: center;
            margin: 30px 0;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 10px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #45a049;
        }
        .btn-secondary {
            background: #2196F3;
        }
        .btn-secondary:hover {
            background: #1976D2;
        }
        .search-form {
            text-align: center;
            margin: 20px 0;
        }
        .search-input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }
        .search-btn {
            padding: 10px 20px;
            background: #FF9800;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-btn:hover {
            background: #F57C00;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= $title ?></h1>
        
        <div class="stats">
            <p>Total Artikel: <strong><?= $total_articles ?></strong></p>
        </div>
        
        <div class="search-form">
            <form action="/article/search" method="GET">
                <input type="text" name="q" placeholder="Cari artikel..." class="search-input" required>
                <button type="submit" class="search-btn">Cari</button>
            </form>
        </div>
        
        <div class="actions">
            <a href="/" class="btn">Home</a>
            <a href="/article/create" class="btn btn-secondary">Buat Artikel Baru</a>
        </div>
        
        <div class="article-list">
            <?php foreach ($articles as $article): ?>
                <div class="article-item">
                    <div class="article-title">
                        <a href="/article/<?= $article['id'] ?>"><?= htmlspecialchars($article['title']) ?></a>
                    </div>
                    <div class="article-meta">
                        Oleh: <?= htmlspecialchars($article['author']) ?> | 
                        Tanggal: <?= $article['created_at'] ?>
                    </div>
                    <div class="article-content">
                        <?= htmlspecialchars(substr($article['content'], 0, 150)) ?>...
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="actions">
            <a href="/" class="btn">Kembali ke Home</a>
        </div>
    </div>
</body>
</html> 