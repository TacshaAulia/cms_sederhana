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
            max-width: 1100px;
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
            font-size: 2.5em;
            font-weight: 900;
            margin-bottom: 30px;
            text-shadow: 0 0 20px rgba(120, 219, 255, 0.5);
            letter-spacing: 3px;
        }
        
        .stats {
            background: linear-gradient(135deg, rgba(120, 219, 255, 0.1) 0%, rgba(120, 119, 198, 0.1) 100%);
            border: 1px solid rgba(120, 219, 255, 0.3);
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .stats::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #78d3ff, #7877c6, #ff77c6);
        }
        
        .stats p {
            font-size: 1.2em;
            color: #e0e0e0;
            font-weight: 600;
        }
        
        .search-form {
            text-align: center;
            margin: 30px 0;
        }
        
        .search-input {
            padding: 15px 20px;
            width: 350px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            margin-right: 15px;
            color: #ffffff;
            font-size: 1em;
            backdrop-filter: blur(10px);
        }
        
        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        
        .search-input:focus {
            outline: none;
            border-color: #78d3ff;
            box-shadow: 0 0 15px rgba(120, 211, 255, 0.3);
        }
        
        .search-btn {
            padding: 15px 25px;
            background: linear-gradient(135deg, #ff9800 0%, #ff5722 100%);
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1em;
            transition: all 0.3s ease;
        }
        
        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 152, 0, 0.4);
        }
        
        .article-list {
            display: grid;
            gap: 25px;
        }
        
        .article-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .article-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #78d3ff, #7877c6);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .article-item:hover::before {
            transform: scaleX(1);
        }
        
        .article-item:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.3),
                0 0 20px rgba(120, 211, 255, 0.1);
            border-color: rgba(120, 211, 255, 0.3);
        }
        
        .article-title {
            font-size: 1.3em;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 15px;
        }
        
        .article-title a {
            color: #78d3ff;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .article-title a:hover {
            color: #ffffff;
            text-shadow: 0 0 10px rgba(120, 211, 255, 0.5);
        }
        
        .article-meta {
            color: #b0b0b0;
            font-size: 0.9em;
            margin-bottom: 15px;
        }
        
        .article-content {
            color: #d0d0d0;
            line-height: 1.6;
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