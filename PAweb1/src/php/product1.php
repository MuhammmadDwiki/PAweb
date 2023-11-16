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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product 1</title>
    <link rel="stylesheet" href="../style/productstyle.css">
</head>
<body>
    <main class="container">
 
        <!-- Left Column / Headphones Image -->
        <div class="left-column">
          <img data-image="black" src="" alt="">
          <img data-image="blue" src="" alt="">
          <img data-image="red" class="active" src="" alt="">
        </div>
       
       
        <!-- Right Column -->
        <div class="right-column">
       
          <!-- Product Description -->
          <div class="product-description">
            <span>Nama Produk</span>
            <h1>Produk/Merek</h1>
            <p>deskripsi prodduknya taroh sini</p>
          </div>
       
          <!-- Product Configuration -->
          <div class="product-configuration">
       
            
       
            <!-- Cable Configuration -->
            <div class="cable-config">
              <span>Configurasi Produk</span>
       
              <div class="cable-choose">
                <button>Pilihan 1</button>
                <button>Pilihan 2</button>
                <button>Pilihan 3</button>
              </div>
              
              <a href="#">balbalbalbalblablablabla</a>
            </div>
          </div>

          <!-- Product Pricing -->
          <div class="product-price">
            <span>Rp.135.000</span>
            <a href="#" class="cart-btn">Add to cart</a>
          </div>
        </div>
      </main>
</body>
</html>