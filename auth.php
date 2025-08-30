<?php
session_start();

// Data Dummy pengguna
$dummy_users = [
    'guru'  => 'guru123',
    'siswa' => 'siswa123',
    'admin' => 'admin'
];

// Ambil data dari form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validasi login
if (isset($dummy_users[$username]) && $dummy_users[$username] === $password) {
    $_SESSION['user'] = $username;

    // Arahkan sesuai role
    if ($username === 'admin') {
        header("Location: admin.php");
    } elseif ($username === 'guru') {
        header("Location: guru.php");
    } elseif ($username === 'siswa') {
        header("Location: index.php");
    } else {
        header("Location: index.php"); // fallback
    }
    exit;
} else {
    header("Location: login.php?error=1"); // gagal → kembali ke login
    exit;
}
?>
