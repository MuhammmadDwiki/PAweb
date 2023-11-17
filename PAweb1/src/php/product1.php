<?php 
session_start();
require "../aksi/koneksi.php";

if (!isset($_SESSION['logged'])) {
    header('Location:Formlogin.php');
}

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $result = mysqli_query($conn, "SELECT * FROM produk where id_produk = '$id'");
  $produk = [];
  while ($row = mysqli_fetch_array($result)){
    $produk[] = $row;
  }
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
        <?php foreach($produk as $prd) { ?>
        <div class="left-column">
          <img data-image="black" src="../assets/<?php echo $prd['gambar'] ?>" alt="">
        </div>
       
       
        <!-- Right Column -->
        <div class="right-column">
          <!-- Product Description -->
            <div class="product-description">
              <span><?php echo $prd['type_barang'] ?></span>
              <h1><?php echo $prd['nama_barang'] ?></h1>
              <p><?php echo $prd['desk'] ?></p>
            </div>
            <!-- Product Pricing -->
            <div class="product-price">
              <span><?php echo $prd['harga'] ?></span>
              <a href="cart.php?id=<?php echo $prd['id_produk'] ?>" class="cart-btn">Add to cart</a>
            </div>
          </div>
        <?php } ?>
      </main>
</body>
</html>