<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Forestia</title>
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h2>Halaman Admin</h2>
            <a href="../auth/logout.php" class="logout-btn">Logout</a>
        </div>
        
        <div class="admin-content">
            
            <div class="admin-table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM users");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['username']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['role']}</td>";
                            echo "<td class='action-links'>
                                    <a href='edit.php?id={$row['id']}' class='btn btn-edit'>Edit</a>
                                    <a href='delete.php?id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <p>&copy; <?php echo date('Y'); ?>Forestia Admin Portal. </p>
    </div>
</body>
</html>