<?php 
session_start();
require "../aksi/koneksi.php";

if (!isset($_SESSION['logged'])) {
    header('Location:Formlogin.php');
}

$result = mysqli_query($conn, "SELECT * FROM produk");
$produk = [];
while ($row = mysqli_fetch_array($result)){
  $produk[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/styleproductpage.css">
</head><link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
<body>
<nav>
            <!-- Gambar logo -->
            <img src="../assets/logostore.png" class="logo">

            <!-- Daftar tak terurut tautan navigasi -->
            <ul>
                <!-- Tautan ke halaman utama -->
                <li><a href="../php/indexlogin.php" id="home-link">Home</a></li>

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
<div class="wrapper c-height">
		<div class="search-area c-height">
			<div class="single-search">
				<input class="custom-input" name="" placeholder="What are you looking for ..." type="text"> <a class="icon-area" href="#"><i class="fa fa-search"></i></a>
			</div>
		</div>
	</div>    
  <div class="wrapper">
    <?php
    foreach ($produk as $prd){?>
      <div class="single-card">
        <div class="img-area" style="background-image: url('../assets/<?php echo $prd['gambar'] ?>');">
          <div class="overlay">
            <a href="../php/cart.php?id=<?php echo $prd["id_produk"]; ?>" class="add-to-cart">Add to Cart</a>
            <a href="../php/product1.php?id=<?php echo $prd["id_produk"]; ?>" class="view-details">View Details</a>
          </div>
          </div>  
        <div class="info">
          <h3><?php echo $prd['nama_barang'] ?></h3>
          <p class="price">Rp.<?php echo $prd['harga'] ?></p>
          <p></p>
        </div>
      </div>
    <?php }
    ?>
    </div>
  </div>
    
</body>
</html>