<?php
session_start();
require "koneksi.php";

if(!isset($_SESSION['login'])){
    $notlogin = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Codashop-like Landing Page</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <div class="fContainer">
    <nav class="wrapper">
      <div class="brand">
        <div class="firstname">PlayPoint</div>
        <div class="lastname">Store</div>
      </div>
      <ul class="navigation">
        <li><a href="login.php">Masuk</a></li>
        <li><a href="keranjang.php" class="active">Keranjang</a></li>
        <li><a href="historyuser.php">Histori User<a></li>
      </ul>
    </nav>
  </div>

  <main class="main-content">
   
     <!-- Card for a game -->
  <section class="game-cards">
    <div class="game-card">
      <img src="img/pubg.jpg" alt="Game 1">
    </div>

    <div class="game-card">
      <img src="img/apex.jpeg" alt="Game 2">
    </div>

    <div class="game-card">
      <img src="img/mobile legend.jpg" alt="Game 3">
    </div>

    <div class="game-card">
      <img src="img/free fire.jpg" alt="Game 4">
    </div>

    <div class="game-card">
      <img src="img/genshin.jpeg" alt="Game 5">
    </div>

    <div class="game-card">
      <img src="img/coc.jpeg" alt="Game 6">
    </div>

    <div class="game-card">
      <img src="img/cod.jpg" alt="Game 7">
    </div>

    <div class="game-card">
      <img src="img/valorant.jpg" alt="Game 8">
    </div>

      <!-- Teks Codashop -->
      <div class="codashop-info">
      <h2>Play Point Store</h2>
      <p>Play Point Store: Platform top-up game terkemuka, yang dapat diandalkan dan tercepat di Indonesia. Setiap bulannya, jutaan gamer mempercayai Play Point Store untuk pengisian kredit game dengan lancar, tanpa hambatan saat registrasi atau masuk, dan kredit permainan langsung tersedia. Tersedia top-up untuk Mobile Legends, Free Fire, Valorant, serta beragam game lainnya!</p>
    </div>

    <!-- You can add more game cards as needed -->
  </section>

  </main>

  <footer class="footer">
  <div class="footer-content">
    <div class="footer-section about">
      <h2>About</h2>
      <p>Website ini menyediakan layanan top-up untuk berbagai game populer. Kami berkomitmen untuk memberikan pengalaman terbaik kepada para gamer dalam melakukan transaksi pembelian diamond, coin, dan item permainan lainnya.</p>
      <div class="contact">
        <span><i class="fas fa-phone"></i> 123-456-789</span>
        <span><i class="fas fa-envelope"></i> info@PlayPointStore.com</span>
      </div>
      <div class="socials">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>

    <div class="footer-section links">
      <h2>Quick Links</h2>
      <ul>
        <li><a href="#">Beranda</a></li>
        <li><a href="#">Permainan</a></li>
        <li><a href="#">Tentang Kami</a></li>
        <li><a href="#">Kontak</a></li>
        <li><a href="#">Kebijakan Privasi</a></li>
      </ul>
    </div>

    <div class="footer-section contact-form">
      <h2>Kirim Pesan</h2>
      <form action="#" method="post">
        <input type="email" name="email" class="text-input contact-input" placeholder="Alamat Email">
        <textarea rows="4" name="message" class="text-input contact-input" placeholder="Pesan Anda"></textarea>
        <button type="submit" class="btn btn-big contact-btn">
          <i class="fas fa-envelope"></i>
          Kirim
        </button>
      </form>
    </div>
  </div>

  <div class="footer-bottom">
    &copy; 2023 GameStore - All Rights Reserved
  </div>
</footer>


<script src="script.js"></script>
</body>
</html>


