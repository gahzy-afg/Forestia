<?php
session_start();
include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: ../admin/admin.php");
        } else {
            header("Location: ../dashboard/user_dashboard.php");
        }
    } else {
        echo "Login gagal. Username atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Forestia</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
<form method="POST">
<div class="login-container">
        <div class="login-form">
            <h1>Log In</h1>
            
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username Anda">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password Anda">
            </div>

            
            <button class="login-button" type="submit">Login</button>
        </div>
        
        <div class="login-sidebar">
            <div class="eco-icon">🌱</div>
            <h2 class="sidebar-title">Hallo, Rek!</h2>
            <p class="sidebar-text">Bergabunglah dengan kami dalam menjaga lingkungan lebih hijau dan sehat untuk masa depan yang lebih baik.</p>
            <a href="register.php" class="register-link">Belum punya akun? Daftar</a>
        </div>
    </div>
</form>


</body>
</html>

<body>
    
</body>
