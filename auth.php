<?php
session_start();

// Data Dummy pengguna
$dummy_users = [
    'guru' => 'guru123',
    'siswa' => 'siswa123',
    'admin' => 'admin'
];

// Ambil data dari form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validasi login
if (isset($dummy_users[$username]) && $dummy_users[$username] === $password) {
    $_SESSION['user'] = $username;
    header("Location: index.php"); // sukses → balik ke halaman utama
    exit;
} else {
    header("Location: login.php?error=1"); // gagal → kembali ke login dengan pesan error
    exit;
}
?>
