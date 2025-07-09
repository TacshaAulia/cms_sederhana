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
        
        .user-info {
            background: linear-gradient(135deg, rgba(120, 219, 255, 0.1) 0%, rgba(120, 119, 198, 0.1) 100%);
            border: 1px solid rgba(120, 219, 255, 0.3);
            padding: 25px;
            border-radius: 15px;
            margin: 30px 0;
            position: relative;
            overflow: hidden;
        }
        
        .user-info::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #78d3ff, #7877c6, #ff77c6);
        }
        
        .user-info p {
            font-size: 1.1em;
            line-height: 1.6;
            color: #e0e0e0;
        }
        
        .user-id {
            background: linear-gradient(135deg, #2196f3 0%, #21cbf3 100%);
            color: white;
            padding: 12px 20px;
            border-radius: 25px;
            display: inline-block;
            margin: 15px 0;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
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
        
        .nav a.secondary {
            background: linear-gradient(135deg, #2196f3 0%, #21cbf3 100%);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= $title ?></h1>
        
        <div class="user-info">
            <p><?= $message ?></p>
            <div class="user-id">
                User ID: <?= $user_id ?>
            </div>
        </div>
        
        <div class="nav">
            <a href="/">Home</a>
            <a href="/user" class="secondary">User List</a>
            <a href="/user/create" class="secondary">Create User</a>
            <a href="/user/<?= $user_id ?>/edit" class="secondary">Edit User</a>
        </div>
        
        <div style="margin-top: 40px; text-align: center; color: #78d3ff; font-size: 0.9em; opacity: 0.8;">
            <p>🔮 Router dengan Parameter - Framework MVC Sederhana</p>
            <div style="margin-top: 10px; font-size: 0.8em; color: #7877c6;">
                <span style="display: inline-block; margin: 0 5px;">⚡</span>
                <span style="display: inline-block; margin: 0 5px;">🚀</span>
                <span style="display: inline-block; margin: 0 5px;">⚡</span>
            </div>
        </div>
    </div>
</body>
</html> 