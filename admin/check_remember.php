<?php
function checkRememberToken($conn) {
    if (isset($_COOKIE['remember_token'])) {
        $token = $_COOKIE['remember_token'];
        
        // Check if token exists and is not expired
        $query = "SELECT u.* FROM users u 
                 INNER JOIN user_tokens t ON u.id = t.user_id 
                 WHERE t.token = ? AND t.expires_at > NOW()";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $token);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($user = mysqli_fetch_assoc($result)) {
            // Set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            
            // Refresh token
            $new_token = bin2hex(random_bytes(32));
            $expires = time() + (30 * 24 * 60 * 60); // 30 days
            
            $query = "UPDATE user_tokens SET token = ?, expires_at = FROM_UNIXTIME(?) WHERE token = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sis", $new_token, $expires, $token);
            mysqli_stmt_execute($stmt);
            
            // Update cookie
            setcookie('remember_token', $new_token, $expires, '/', '', true, true);
            
            return true;
        }
        
        // If token is invalid or expired, remove it
        setcookie('remember_token', '', time() - 3600, '/');
    }
    
    return false;
}
?> 