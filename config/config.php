<?php
$host = "localhost";
$user = "root"; 
$password = ""; 
$dbname = "forestia";

// Buat koneksi ke database
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
