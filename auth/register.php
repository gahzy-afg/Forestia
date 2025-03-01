<?php
include '../config/config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = "user"; // Default role

    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: login.php"); // Arahkan ke halaman dashboard  
        exit;
       
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
<link rel="stylesheet" href="../CSS/login.css">
</head>

    <body>


    <form action="" method="POST">

<div class="login-container">
        <div class="login-form">
            <h1>Register</h1>
            
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username Anda">
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input type="text" id="email" name="email" placeholder="Masukkan Email Anda">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password Anda">
            </div>
            
            
            <button class="login-button" type="submit">Register</button>
        </div>
        
        <div class="login-sidebar">
            <div class="eco-icon">🌱</div>
            <h2 class="sidebar-title">Hallo, Rek!</h2>
            <p class="sidebar-text">Bergabunglah dengan kami dalam menjaga lingkungan lebih hijau dan sehat untuk masa depan yang lebih baik.</p>
            <a href="login.php" class="register-link">Sudah punya akun? Masuk</a>
        </div>
    </div>
</form>


    </body>
</html>





