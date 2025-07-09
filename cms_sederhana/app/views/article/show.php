<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Rajdhani', sans-serif;
            background: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            color: #ffffff;
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.2) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 
                0 25px 45px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }
        
        .container:hover::before {
            left: 100%;
        }
        
        h1 {
            font-family: 'Orbitron', monospace;
            color: #ffffff;
            text-align: center;
            font-size: 2.2em;
            font-weight: 900;
            margin-bottom: 30px;
            text-shadow: 0 0 20px rgba(120, 219, 255, 0.5);
            letter-spacing: 2px;
        }
        
        .article-meta {
            background: linear-gradient(135deg, rgba(120, 219, 255, 0.1) 0%, rgba(120, 119, 198, 0.1) 100%);
            border: 1px solid rgba(120, 219, 255, 0.3);
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }
        
        .article-meta::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #78d3ff, #7877c6, #ff77c6);
        }
        
        .article-id {
            background: linear-gradient(135deg, #ff9800 0%, #ff5722 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            display: inline-block;
            margin: 10px 0;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(255, 152, 0, 0.3);
        }
        
        .article-meta p {
            color: #e0e0e0;
            margin: 8px 0;
            font-size: 1.1em;
        }
        
        .article-content {
            line-height: 1.8;
            color: #d0d0d0;
            margin-bottom: 30px;
            font-size: 1.1em;
            background: rgba(255, 255, 255, 0.03);
            padding: 25px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .article-tags {
            margin: 25px 0;
        }
        
        .tag {
            display: inline-block;
            background: linear-gradient(135deg, #2196f3 0%, #21cbf3 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            margin: 5px;
            font-size: 0.9em;
            font-weight: 500;
            box-shadow: 0 3px 10px rgba(33, 150, 243, 0.3);
            transition: all 0.3s ease;
        }
        
        .tag:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.4);
        }
        
        .actions {
            text-align: center;
            margin: 40px 0;
        }
        
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: linear-gradient(135deg, #78d3ff 0%, #7877c6 100%);
            color: #ffffff;
            text-decoration: none;
            border-radius: 25px;
            margin: 0 15px;
            font-weight: 600;
            font-size: 1.1em;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 
                0 10px 25px rgba(120, 211, 255, 0.4),
                0 0 20px rgba(120, 211, 255, 0.2);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #2196f3 0%, #21cbf3 100%);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= htmlspecialchars($article['title']) ?></h1>
        
        <div class="article-meta">
            <div class="article-id">ID: <?= $article['id'] ?></div>
            <p><strong>Penulis:</strong> <?= htmlspecialchars($article['author']) ?></p>
            <p><strong>Tanggal:</strong> <?= $article['created_at'] ?></p>
            <?php if (isset($article['category'])): ?>
                <p><strong>Kategori:</strong> <?= htmlspecialchars($article['category']) ?></p>
            <?php endif; ?>
        </div>
        
        <div class="article-content">
            <?= nl2br(htmlspecialchars($article['content'])) ?>
        </div>
        
        <?php if (isset($article['tags']) && !empty($article['tags'])): ?>
            <div class="article-tags">
                <strong>Tags:</strong>
                <?php foreach ($article['tags'] as $tag): ?>
                    <span class="tag"><?= htmlspecialchars($tag) ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <div class="actions">
            <a href="/article" class="btn">Daftar Artikel</a>
            <a href="/article/<?= $article['id'] ?>/edit" class="btn btn-secondary">Edit Artikel</a>
            <a href="/article/<?= $article['id'] ?>/delete" class="btn btn-danger">Hapus Artikel</a>
            <a href="/" class="btn">Kembali ke Home</a>
        </div>
    </div>
</body>
</html> 