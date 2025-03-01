<?php
session_start();
include '../config/config.php';

// diCek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Ambil data user dari database
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <link rel="stylesheet" href="../CSS/dashboard_user.css">
</head>
<body>
    <div class="container">
        <h2>Selamat Datang, <?php echo htmlspecialchars($user['username']); ?>!</h2>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>

        <!-- bisa nambahi CRUD User di Sini -->
        <h3>Update Data User</h3>
        <form method="POST" action="edit.php">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
           
        </form>

        <br>
        <a href="delete.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Hapus Akun</a>
        <br>
        <a href="../auth/logout.php">Logout</a>
        <br>
        <a href="../index.html">kembali ke Halaman Utama</a>
    </div>
</body>
</html>
