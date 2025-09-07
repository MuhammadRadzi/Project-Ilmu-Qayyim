    <?php
    session_start();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beranda | IlmuQayyim</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="image/IQ-Transparent.png" type="image/x-icon">
        <script src="scrollup.js"></script>
        <script src="script.js"></script>
    
    <style>
/* Dropdown container */
.dropdown {
  position: relative;
}

/* Tombol dropdown */
.dropbtn {
  cursor: pointer;
  color: white;
  font-weight: 500;
  text-decoration: none;
}

/* Isi dropdown */
.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  top: 40px;
  background: white;
  min-width: 220px;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  padding: 10px;
  z-index: 99;
}

/* Profil di dropdown */
.dropdown-content .profile {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 8px;
  border-bottom: 1px solid #eee;
}

.dropdown-content .profile img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
}

/* Link dalam dropdown */
.dropdown-content a {
  display: block;
  padding: 8px 10px;
  text-decoration: none;
  color: #333;
  border-radius: 5px;
}

.dropdown-content a:hover {
  background: #f1f1f1;
}

/* Tombol logout */
.dropdown-content a.logout {
  background: #3674B5;
  color: #fff;
  margin-top: 8px;
  text-align: center;
}

.dropdown-content a.logout:hover {
  background: #E43636;
}

/* Hover effect */
.dropdown:hover .dropdown-content {
  display: block;
}

    </style>
    </head>
    <body>
        <nav id="navbar">
            <div class="logo">
                <img id="radzi" src="image/IQ-Contrast.png" alt="ilmuqayyimiqis">
                <div class="teks-logo">
                    Ilmu <br> Qayyim
                </div>
            </div>

            <div class="hamburger" onclick="toggleMenu()">☰</div>
            <ul id="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="subjects.html">Subjects</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="about.html">About</a></li>

                <?php if (isset($_SESSION['user'])): ?>
                    <?php
                        $role = $_SESSION['user'];
                        // Tentukan dashboard sesuai role
                        $dashboard = "#";
                        if ($role === 'admin') {
                            $dashboard = "admin.php";
                        } elseif ($role === 'guru') {
                            $dashboard = "guru.php";
                        } elseif ($role === 'siswa') {
                            $dashboard = "index.php";
                        }
                    ?>
                    <li class="dropdown">
        <a href="#" class="dropbtn">Halo, <?= ucfirst($role); ?> ▾</a>
        <div class="dropdown-content">
            <div class="profile">
                <img src="image/profile.png" alt="Profile"> <!-- bisa diganti dari DB -->
                <span><?= ucfirst($role); ?> profile</span>
            </div>
            <a href="<?= $dashboard; ?>">Dashboard</a>
            <a href="logout.php" class="logout">Keluar</a>
        </div>
    </li>
<?php else: ?>
    <li><a href="login.php" class="login-button">Login</a></li>
<?php endif; ?>

        </nav>
        <div class="banner">
            <img src="image/gedung-iqis.jpg" alt="gedung-iqis">
            <div class="banner-text">
                <h1>Belajar Dengan<br>Ilmu Qayyim</h1>
                <p>"Menuntut ilmu itu wajib atas setiap muslim" - Rasulullah ﷺ</p>
                <a href="subjects.html" class="banner-button">Mulai Belajar</a>
            </div>
        </div>

        <h1 class="content-title">Terakhir dipelajari</h1>
        <div class="carousel-container">
            <button class="carousel-btn prev" onclick="moveSlide(-1)">&#10094;</button>
            <div class="carousel-track">
                <div class="card">
                    <img src="image/indonesia.jpg" alt="">
                    <div class="card-content">
                        <div class="card-title">Bahasa Indonesia</div>
                        <div class="card-description">Belajarlah dengan gembira dan semangat untuk mencapai kesuksesan hidup.</div>
                        <a href="pelajaran/mtr-bindo.html" class="card-button">Lanjut Belajar!</a>
                    </div>
                </div>
                <div class="card">
                    <img src="image/indonesia.jpg" alt="">
                    <div class="card-content">
                        <div class="card-title">Bahasa Indonesia</div>
                        <div class="card-description">Belajarlah dengan gembira dan semangat untuk mencapai kesuksesan hidup.</div>
                        <a href="pelajaran/mtr-bindo.html" class="card-button">Lanjut Belajar!</a>
                    </div>
                </div>
                <div class="card">
                    <img src="image/indonesia.jpg" alt="">
                    <div class="card-content">
                        <div class="card-title">Bahasa Indonesia</div>
                        <div class="card-description">Belajarlah dengan gembira dan semangat untuk mencapai kesuksesan hidup.</div>
                        <a href="pelajaran/mtr-bindo.html" class="card-button">Lanjut Belajar!</a>
                    </div>
                </div>
                <div class="card">
                    <img src="image/pjok.png" alt="">
                    <div class="card-content">
                        <div class="card-title">PJOK</div>
                        <div class="card-description">Belajarlah dengan gembira dan semangat untuk mencapai kesuksesan hidup.</div>
                        <a href="pelajaran/mtr-pjok.html" class="card-button">Lanjut Belajar!</a>
                    </div>
                </div>
                <div class="card">
                    <img src="image/pplg.jpg" alt="">
                    <div class="card-content">
                        <div class="card-title">PPLG</div>
                        <div class="card-description">Belajarlah dengan gembira dan semangat untuk mencapai kesuksesan hidup.</div>
                        <a href="pelajaran/mtr-pplg.html" class="card-button">Lanjut Belajar!</a>
                    </div>
                </div>
            </div>
            <button class="carousel-btn next" onclick="moveSlide(1)">&#10095;</button>
        </div>


        <h1 class="content-title">QUIZ</h1>
        <div class="carousel-container quiz-carousel">
            <button class="carousel-btn prev" onclick="moveQuiz(-1)">&#10094;</button>
            <div class="carousel-track quiz-track">
                <div class="card">
                    <img src="image/indonesia.jpg" alt="">
                    <div class="card-content">
                        <div class="card-title">Bahasa Indonesia</div>
                        <div class="card-description">Belajarlah dari kesalahan dan bangunlah dengan kebijaksanaan baru.</div>
                        <a href="pelajaran/quiz-bindo.html" class="card-button">Asah Otak!</a>
                    </div>
                </div>
                <div class="card">
                    <img src="image/ipas.png" alt="">
                    <div class="card-content">
                        <div class="card-title">IPAS</div>
                        <div class="card-description">Belajarlah dari kesalahan dan bangunlah dengan kebijaksanaan baru.</div>
                        <a href="pelajaran/quiz-ipas.html" class="card-button">Asah Otak!</a>
                    </div>
                </div>
                <div class="card">
                    <img src="image/ppkn.png" alt="">
                    <div class="card-content">
                        <div class="card-title">PPKN</div>
                        <div class="card-description">Belajarlah dari kesalahan dan bangunlah dengan kebijaksanaan baru.</div>
                        <a href="pelajaran/quiz-ppkn.html" class="card-button">Asah Otak!</a>
                    </div>
                </div>
                <div class="card">
                    <img src="image/ppkn.png" alt="">
                    <div class="card-content">
                        <div class="card-title">PPKN</div>
                        <div class="card-description">Belajarlah dari kesalahan dan bangunlah dengan kebijaksanaan baru.</div>
                        <a href="pelajaran/quiz-ppkn.html" class="card-button">Asah Otak!</a>
                    </div>
                </div>
                <div class="card">
                    <img src="image/ppkn.png" alt="">
                    <div class="card-content">
                        <div class="card-title">PPKN</div>
                        <div class="card-description">Belajarlah dari kesalahan dan bangunlah dengan kebijaksanaan baru.</div>
                        <a href="pelajaran/quiz-ppkn.html" class="card-button">Asah Otak!</a>
                    </div>
                </div>
            </div>
            <button class="carousel-btn next" onclick="moveQuiz(1)">&#10095;</button>
        </div>


        <!-- Footer -->

        <footer class="footer">
            <div class="footer-title">
                <img src="image/IQ-Contrast.png" alt="IQ-Logo" class="footer-logo" id="scrollUp">
                <span>Ilmu Qayyim</span>
            </div>

            <div class="footer-socials">
                <a target="_blank" href="https:/facebook.com"><img src="image-socmed/Facebook.png" alt="Facebook" /></a>
                <a target="_blank" href="https:/instagram.com"><img src="image-socmed/Instagram.png" alt="Instagram" /></a>
                <a target="_blank" href="https:/tiktok.com"><img src="image-socmed/TikTok.png" alt="TikTok" /></a>
                <a target="_blank" href="https:/youtube.com"><img src="image-socmed/Youtube.png" alt="Youtube" /></a>
                <a target="_blank" href="https:/twitter.com"><img src="image-socmed/twitter.png" alt="Twitter" /></a>
                <a target="_blank" href="https:/whatsapp.com"><img src="image-socmed/WhatsApp.png" alt="WhatsApp" /></a>
                <a target="_blank" href="https:/telegram.org"><img src="image-socmed/Telegram.png" alt="Telegram" /></a>
            </div>

            <p class="footer-copy">&copy; 2025 Ilmu Qayyim. All rights reserved.</p>
        </footer>

    </body>

    </html>