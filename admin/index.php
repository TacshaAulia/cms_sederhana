<?php
session_start();
require_once '../config/database.php';
require_once 'check_remember.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Try to login using remember me token
    if (!checkRememberToken($conn)) {
        header("Location: login.php");
        exit();
    }
}

// Get user data
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CMS Admin | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    .sidebar-dark-primary {
      background: linear-gradient(135deg, #1a237e 0%, #0d47a1 100%);
    }
    .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active {
      background: linear-gradient(135deg, #00bcd4 0%, #0097a7 100%);
      box-shadow: 0 0 15px rgba(0, 188, 212, 0.5);
    }
    .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link:hover {
      background: linear-gradient(135deg, #00bcd4 0%, #0097a7 100%);
      box-shadow: 0 0 10px rgba(0, 188, 212, 0.3);
    }
    .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link {
      border-radius: 5px;
      margin: 2px 10px;
      transition: all 0.3s ease;
    }
    .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link i {
      color: #00bcd4;
    }
    .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link:hover i {
      color: #fff;
    }
    .brand-link {
      background: linear-gradient(135deg, #1a237e 0%, #0d47a1 100%);
      border-bottom: 1px solid rgba(0, 188, 212, 0.2);
    }
    .brand-text {
      color: #00bcd4 !important;
      text-shadow: 0 0 10px rgba(0, 188, 212, 0.5);
    }
    .small-box {
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }
    .small-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }
    .user-panel {
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      padding: 15px;
    }
    .user-panel .info {
      color: #fff;
    }
    .user-panel .info a {
      color: #00bcd4;
      text-shadow: 0 0 10px rgba(0, 188, 212, 0.5);
    }
    .main-header {
      background: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .content-wrapper {
      background: #f4f6f9;
    }
    .content-header {
      padding: 20px 0.5rem;
    }
    .content-header h1 {
      font-size: 1.8rem;
      color: #1a237e;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($user['username']); ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="profile.php" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <span class="brand-text font-weight-light">CMS Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="fas fa-user-circle fa-2x text-light"></i>
        </div>
        <div class="info">
          <a href="profile.php" class="d-block"><?php echo htmlspecialchars($user['username']); ?></a>
          <small class="text-light"><?php echo ucfirst($user['role']); ?></small>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="posts.php" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>Posts</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages.php" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Pages</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="categories.php" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>Categories</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="users.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="settings.php" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Settings</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $query = "SELECT COUNT(*) as total FROM posts";
                $result = mysqli_query($conn, $query);
                $posts = mysqli_fetch_assoc($result)['total'];
                ?>
                <h3><?php echo $posts; ?></h3>
                <p>Posts</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-alt"></i>
              </div>
              <a href="posts.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $query = "SELECT COUNT(*) as total FROM pages";
                $result = mysqli_query($conn, $query);
                $pages = mysqli_fetch_assoc($result)['total'];
                ?>
                <h3><?php echo $pages; ?></h3>
                <p>Pages</p>
              </div>
              <div class="icon">
                <i class="fas fa-file"></i>
              </div>
              <a href="pages.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $query = "SELECT COUNT(*) as total FROM users";
                $result = mysqli_query($conn, $query);
                $users = mysqli_fetch_assoc($result)['total'];
                ?>
                <h3><?php echo $users; ?></h3>
                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                $query = "SELECT COUNT(*) as total FROM categories";
                $result = mysqli_query($conn, $query);
                $categories = mysqli_fetch_assoc($result)['total'];
                ?>
                <h3><?php echo $categories; ?></h3>
                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="fas fa-tags"></i>
              </div>
              <a href="categories.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Recent Activity -->
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recent Posts</h3>
              </div>
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <?php
                  $query = "SELECT p.*, u.username FROM posts p 
                           JOIN users u ON p.author_id = u.id 
                           ORDER BY p.created_at DESC LIMIT 5";
                  $result = mysqli_query($conn, $query);
                  while ($post = mysqli_fetch_assoc($result)):
                  ?>
                  <li class="item">
                    <div class="product-info">
                      <a href="edit-post.php?id=<?php echo $post['id']; ?>" class="product-title">
                        <?php echo htmlspecialchars($post['title']); ?>
                        <span class="badge badge-<?php echo $post['status'] == 'published' ? 'success' : 'warning'; ?> float-right">
                          <?php echo ucfirst($post['status']); ?>
                        </span>
                      </a>
                      <span class="product-description">
                        By <?php echo htmlspecialchars($post['username']); ?> on 
                        <?php echo date('M d, Y', strtotime($post['created_at'])); ?>
                      </span>
                    </div>
                  </li>
                  <?php endwhile; ?>
                </ul>
              </div>
              <div class="card-footer text-center">
                <a href="posts.php" class="uppercase">View All Posts</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recent Users</h3>
              </div>
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <?php
                  $query = "SELECT * FROM users ORDER BY created_at DESC LIMIT 5";
                  $result = mysqli_query($conn, $query);
                  while ($user = mysqli_fetch_assoc($result)):
                  ?>
                  <li class="item">
                    <div class="product-info">
                      <a href="edit-user.php?id=<?php echo $user['id']; ?>" class="product-title">
                        <?php echo htmlspecialchars($user['username']); ?>
                        <span class="badge badge-info float-right">
                          <?php echo ucfirst($user['role']); ?>
                        </span>
                      </a>
                      <span class="product-description">
                        <?php echo htmlspecialchars($user['email']); ?>
                      </span>
                    </div>
                  </li>
                  <?php endwhile; ?>
                </ul>
              </div>
              <div class="card-footer text-center">
                <a href="users.php" class="uppercase">View All Users</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">CMS Sederhana</a>.</strong>
    All rights reserved.
  </footer>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html> 