<?php
session_start();
require_once '../config/database.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
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
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <span class="brand-text font-weight-light">CMS Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
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
            <a href="users.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
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
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
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
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
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
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">CMS Sederhana</a>.</strong>
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html> 