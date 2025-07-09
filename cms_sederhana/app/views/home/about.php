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
            font-size: 2.5em;
            font-weight: 900;
            margin-bottom: 30px;
            text-shadow: 0 0 20px rgba(120, 219, 255, 0.5);
            letter-spacing: 3px;
        }
        
        .content {
            line-height: 1.8;
            color: #e0e0e0;
            font-size: 1.1em;
        }
        
        .content p {
            margin-bottom: 20px;
        }
        
        .content ul {
            margin: 20px 0;
            padding-left: 30px;
        }
        
        .content li {
            margin-bottom: 10px;
            position: relative;
        }
        
        .content li::before {
            content: '⚡';
            position: absolute;
            left: -25px;
            color: #78d3ff;
        }
        
        .nav {
            text-align: center;
            margin: 40px 0;
        }
        
        .nav a {
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
        
        .nav a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }
        
        .nav a:hover::before {
            left: 100%;
        }
        
        .nav a:hover {
            transform: translateY(-3px);
            box-shadow: 
                0 10px 25px rgba(120, 211, 255, 0.4),
                0 0 20px rgba(120, 211, 255, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= $title ?></h1>
        
        <div class="content">
            <p><?= $message ?></p>
            <p>CMS Sederhana ini dibangun menggunakan framework MVC buatan sendiri dengan PHP. Framework ini terdiri dari:</p>
            <ul>
                <li><strong>Model:</strong> Menangani logika database dan data</li>
                <li><strong>View:</strong> Menampilkan tampilan kepada pengguna</li>
                <li><strong>Controller:</strong> Menangani logika bisnis dan mengatur alur aplikasi</li>
            </ul>
            <p>Framework ini dirancang untuk pembelajaran dan dapat dikembangkan lebih lanjut sesuai kebutuhan.</p>
        </div>
        
        <div class="nav">
            <a href="/">Home</a>
            <a href="/home/about">About</a>
            <a href="/admin">Admin</a>
        </div>
    </div>
</body>
</html> 