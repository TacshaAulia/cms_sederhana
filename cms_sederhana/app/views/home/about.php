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
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .content {
            line-height: 1.6;
            color: #555;
        }
        .nav {
            text-align: center;
            margin: 20px 0;
        }
        .nav a {
            display: inline-block;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 10px;
        }
        .nav a:hover {
            background: #45a049;
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