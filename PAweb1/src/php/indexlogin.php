<?php
session_start();
require "../aksi/koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            header("Location: indexlogin.php");
            exit();
        } else {
            echo "
                    <script>
                    alert('Invalid Password');
                    document.location.href = 'indexlogin.php';
                    </script>
                ";
        }
    } else {
        echo "
                    <script>
                    alert('Invalid Username');
                    document.location.href = 'indexlogin.php';
                    </script>
                ";
    }
}
$url = "../php/index.php";
$url_login = "../php/indexlogin.php";


if(isset($_SESSION["logged"])) {
    $login = $_SESSION["logged"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Mengatur karakter set dokumen -->
    <meta charset="UTF-8">

    <!-- Pengaturan viewport untuk desain responsif -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul halaman web -->
    <title>Web mancing</title>

    <!-- Tautan ke file stylesheet eksternal -->
    <link rel="stylesheet" href="../style/styleindex.css">

    <!-- Tautan ke file JavaScript eksternal -->
    <script src="./script/javaindex.js"></script>
</head>
<body>
    <!-- Kontainer utama dengan latar belakang video -->
    <div class="hero">
    <!-- Elemen gambar GIF -->
    <img src="../Media/indexbggif.gif" class="back-gif">

    <!-- Konten dalam bagian hero -->
    <div class="content">
            <!-- Judul menyambut pengguna -->
            <h1 class="welcome-text">Welcome</h1>

            <!-- Tautan untuk pergi mancing (tautan sementara) -->
            <a href="https://www.mardalani.com/2022/07/kolam-pemancingan-di-samarinda-paling-laris.html" class="fishing-text">Info Mancing!</a>
        </div>

        <!-- Menu navigasi -->
        <nav>
            <!-- Gambar logo -->
            <img src="../assets/logostore.png" class="logo">

            <!-- Daftar tak terurut tautan navigasi -->
            <ul>
                <!-- Tautan ke halaman utama -->
                <li><a href="<?= isset($login) ? $url_login : $url ?>" id="home-link">Home</a></li>

                <!-- Tautan sementara untuk "Produk" -->
                <li><a href="../php/productpage.php" id="categories-link">Produk</a></li>

                <!-- Tautan sementara untuk "Article" -->
                <li><a href="https://www.outdoorlife.com/category/fishing/" id="idk2-link">Article</a></li>

                <!-- Tautan sementara untuk "Spot Mancing" -->
                <li><a href="https://www.mardalani.com/2022/07/kolam-pemancingan-di-samarinda-paling-laris.html" id="idk3-link">Spot Mancing</a></li>

                <!-- Tautan ke halaman About Us -->
                <li><a href="../php/aboutus.php" id="about-us-link">About Us</a></li>

                <!-- Tautan ke halaman login -->
                <li><a href="../php/logout.php" id="login-link">logout</a></li>
            </ul>
        </nav>
    </div>

    <!-- Pembungkus untuk area konten -->
    <div class="wrapper">
        <div class="services">
        <a href="../php/productpage.php">
            <span class="single-img img-one">
                <span class="img-text">
                    <h4>PLUSINNO Fishing Rod</h4>
                    <p></p>
                    <button>Buy Now</button>
                </span> 
            </span>
        </a>
        <a href="../php/productpage.php">
            <span class="single-img img-two"> 
                <span class="img-text">
                    <h4>RYOBI ZEUS HP 6000 </h4>
                    <p></p>
                    <button>Buy Now</button>
                </span>
            </span>
        </a>
        <a href="../php/productpage.php">
            <span class="single-img img-three">
                <span class="img-text">
                    <h4>PE Shimano SEPHIA 0.4 150M</h4>
                    <p></p>
                    <button>Buy Now</button>
                </span>
            </span>
        </a>
        <a href="../php/productpage.php">
            <span class="single-img img-four">
                <span class="img-text">
                    <h4>HAMMER HEAD CHINU MERAH</h4>
                    <p></p>
                    <button>Buy Now</button>
                </span>
            </span>
        </a>
        <a href="../php/productpage.php">
            <span class="single-img img-five">
                <span class="img-text">
                    <h4>Kili Kili Catfish Three Way Swivel</h4>
                    <p></p>
                    <button>Buy Now</button>
                </span>
            </span>
        </a>
        <a href="../php/productpage.php">
            <span class="single-img img-six">
                <span class="img-text">
                    <h4>ESSEN STELLA MURNI AROMA SOTO AYAM</h4>
                    <p></p>
                    <button>Buy Now</button>
                </span>
            </span>
        </a>
    </div>
    </div>

    <!-- Bagian footer -->
    <footer class="footer">
        <!-- Div gelombang animasi untuk dekorasi -->
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>

        <!-- Ikon media sosial dengan tautan sementara -->
        <ul class="social-icon">
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-facebook"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="https://www.instagram.com/mhmdwiki/">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
    </ul>
    <ul class="menu">
      <li class="menu__item"><a class="menu__link" href="#">Home</a></li>
      <li class="menu__item"><a class="menu__link" href="#">About US</a></li>
      <li class="menu__item"><a class="menu__link" href="#">Contact</a></li>

    </ul>
    <p>&copy;2023 Strike Penuh Aksi | All Rights Reserved</p>
  </footer>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
