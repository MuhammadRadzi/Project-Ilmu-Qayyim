<?php
session_start();

// Cek login guru
if (!isset($_SESSION['user']) || $_SESSION['user'] !== "guru") {
    header("Location: login.php");
    exit;
}

$page = $_GET['page'] ?? 'dashboard'; // default ke dashboard
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Guru</title>
</head>
<style>
/* General */
body {
  background-color: #F8F8FF;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  margin: 0;
  padding: 0;
  color: #333;
}

/* Sidebar */
.sidebar {
  width: 200px;
  background: #3674B5;
  color: white;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  padding: 20px;
  box-shadow: 2px 0 10px rgba(0,0,0,0.1);
}

.sidebar h2 {
  text-align: center;
  margin-bottom: 40px;
  font-size: 26px;
  font-weight: bold;
}

.sidebar ul {
  list-style: none;
  padding: 0;
}

.sidebar ul li {
  margin: 20px 0;
}

.sidebar ul li a {
  text-decoration: none;
  color: white;
  font-size: 18px;
  font-weight: bold;
  padding: 10px 15px;
  display: block;
  border-radius: 8px;
  transition: background-color 0.3s ease;
}

.sidebar ul li a:hover,
.sidebar ul li a.active {
  background: white;
  color: #3674B5;
}

.logout {
  background: #e74c3c !important;
  border-radius: 8px;
  font-weight: bold;
}
.logout:hover {
  background: white !important;
  color: #e74c3c !important;
}

/* Main content */
.main-content {
  margin-left: 240px;
  padding: 20px;
}

header {
  background: white;
  padding: 15px 20px;
  border-radius: 12px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  display: flex;
  justify-content: space-between;
  align-items: center;
}

header h1 {
  color: #3674B5;
}

.user-info {
  font-size: 18px;
  font-weight: bold;
}

/* Dashboard cards */
.cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 20px;
  margin-top: 30px;
}

.card {
  background: white;
  padding: 25px;
  border-radius: 12px;
  text-align: center;
  box-shadow: 0 6px 10px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
}

.card:hover {
  transform: scale(1.05);
}

.card h3 {
  color: #3674B5;
  margin-bottom: 10px;
}

.card p {
  font-size: 20px;
  font-weight: bold;
}

/* Data table */
.data-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  background: white;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 6px 10px rgba(0,0,0,0.1);
}

.data-table th, 
.data-table td {
  padding: 12px 16px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.data-table th {
  background: #3674B5;
  color: white;
}

.data-table tr:hover {
  background: #f1f1f1;
}

/* List */
.list {
  background: white;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 6px 10px rgba(0,0,0,0.1);
}

.list li {
  padding: 10px 0;
  border-bottom: 1px solid #eee;
}

.list li:last-child {
  border-bottom: none;
}

/* Button */
.btn-save {
  background: #3674B5;
  color: white;
  border: none;
  padding: 12px 20px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: bold;
  transition: all 0.3s ease;
}

.btn-save:hover {
  background: white;
  color: #3674B5;
  border: 2px solid #3674B5;
}
</style>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h2>Guru Panel</h2>
    <ul>
      <li><a href="guru.php?page=dashboard">🏠 Dashboard</a></li>
      <li><a href="guru.php?page=jadwal">📅 Jadwal Mengajar</a></li>
      <li><a href="guru.php?page=siswa">👨‍🎓 Siswa Bimbingan</a></li>
      <li><a href="guru.php?page=materi">📘 Materi Ajar</a></li>
      <li><a href="guru.php?page=pengaturan">⚙️ Pengaturan</a></li>
      <li><a href="logout.php" class="logout">🚪 Logout</a></li>
    </ul>
  </div>

  <!-- Konten Utama -->
  <div class="main-content">
    <header>
      <h1>Dashboard Guru</h1>
      <div class="user-info">
        <span>👨‍🏫 Guru</span>
      </div>
    </header>

    <main>
      <?php
      // Switch Page
      switch ($page) {
          case 'dashboard':
              echo "<h2>Selamat Datang di Dashboard Guru!</h2>
                    <p>Gunakan menu di samping untuk mengelola kegiatan mengajar.</p>
                    <div class='cards'>
                        <div class='card'><h3>Jumlah Kelas</h3><p>5 Kelas</p></div>
                        <div class='card'><h3>Siswa Bimbingan</h3><p>120 Orang</p></div>
                        <div class='card'><h3>Mata Pelajaran</h3><p>2 Mapel</p></div>
                    </div>";
              break;

          case 'jadwal':
              echo "<h2>Jadwal Mengajar</h2>
                    <table class='data-table'>
                        <tr><th>Hari</th><th>Jam</th><th>Mata Pelajaran</th><th>Kelas</th></tr>
                        <tr><td>Senin</td><td>08.00 - 09.30</td><td>Matematika</td><td>XI IPA</td></tr>
                        <tr><td>Rabu</td><td>10.00 - 11.30</td><td>Fisika</td><td>XI IPA</td></tr>
                    </table>";
              break;

          case 'siswa':
              echo "<h2>Siswa Bimbingan</h2>
                    <table class='data-table'>
                        <tr><th>No</th><th>Nama</th><th>Kelas</th></tr>
                        <tr><td>1</td><td>Andi</td><td>XI IPA</td></tr>
                        <tr><td>2</td><td>Budi</td><td>XI IPA</td></tr>
                    </table>";
              break;

          case 'materi':
              echo "<h2>Materi Ajar</h2>
                    <ul class='list'>
                        <li>Aljabar</li>
                        <li>Trigonometri</li>
                        <li>Fisika Dasar</li>
                    </ul>";
              break;

          case 'pengaturan':
              echo "<h2>Pengaturan</h2>
                    <p>Di sini Anda bisa mengubah konfigurasi akun guru.</p>
                    <button class='btn-save'>Simpan Perubahan</button>";
              break;

          default:
              echo "<h2>Halaman tidak ditemukan!</h2>";
      }
      ?>
    </main>
  </div>
</body>
</html>
