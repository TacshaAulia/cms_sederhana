<?php
session_start();
require_once 'config/database.php';

// Get the current page from URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Header
include 'includes/header.php';

// Navigation
include 'includes/navigation.php';

// Content
switch($page) {
    case 'home':
        include 'pages/home.php';
        break;
    case 'post':
        include 'pages/single-post.php';
        break;
    case 'page':
        include 'pages/single-page.php';
        break;
    default:
        include 'pages/404.php';
        break;
}

// Footer
include 'includes/footer.php';
?> 