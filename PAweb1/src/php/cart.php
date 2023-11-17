<?php
session_start();
require "../aksi/koneksi.php";

// if($_SESSION['username'] == 'admin'){
//     header('Location: index.php');
//     exit;
// }

date_default_timezone_set("Asia/Makassar");
$date = date('Y/m/d');

if(isset($_SESSION['logged'])){
    if(isset($_GET["id"])){
        $idproduk = $_GET["id"];
        $iduser = $_SESSION['id'];
        $result = mysqli_query($conn, "select * from produk where id_produk = '$idproduk'");
        $results = mysqli_query($conn, "insert into keranjang 
        (id_keranjang, id_produk, id_akun, quantity, tanggal_pesanan) 
        values ('', '$idproduk', '$iduser', 1, '$date')");
        if ($results) {
            echo "
                <script>
                    alert('Berhasil Dipesan!');
                    document.location.href = 'cart.php';
                </script>
            ";
        }
        else {
            echo error_log($result) . "
            <script>
                alert('Data Gagal Ditambahkan!');
                document.location.href = 'productpage.php';
            </script>
            ";
        }  
    }
    else{
        $username = $_SESSION['username'];
        $result = mysqli_query($conn, "SELECT * from keranjang krj
        join akun akn on krj.id_akun = akn.id_akun
        join produk prd on krj.id_produk = prd.id_produk
        where akn.username = '$username'
        ");
    }
}
else{
    header('Location: productpage.php');
    exit;
}

$produk = [];

while ($row = mysqli_fetch_assoc($result)) {
    $produk[] = $row;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="../style/stylecart.css" rel="stylesheet">
</head>
<body>
    <form action="https://wa.me/6282291550686" method="post">
        <div class="wrapper">
    <h1>Cart</h1>
    <!-- Back to Products Link -->
    <a href="productpage.php" class="back-to-products">Back to Products</a>

    <form action="https://wa.me/6282291550686" method="post">
        <div class="project">
            <div class="shop">
                <?php 
                $totalharga = 0;
                foreach($produk as $prd){ ?>
                    <div class="box">
                        <img src="../assets/<?php echo $prd["gambar"]; ?>">
                        <div class="content">
                            <h3><?php echo $prd["nama_barang"]; ?></h3>
                            <h4><?php echo $prd["harga"]; ?></h4>
                            <input type="hidden" name="idkeranjang[]" value="<?php echo $prd["id_keranjang"] ?>">
                            <p class="unit">Quantity: <input type="number" name="jumlah[]" value="<?php echo $prd["quantity"] ?>"></p>
                            <a href="../php/remove.php?id=<?php echo $prd["id_keranjang"]; ?>">
                                <p class="btn-area"><i aria-hidden="true" class="fa fa-trash"></i> <span class="btn2">Remove</span></p>
                            </a>
                        </div>
                    </div>
                <?php 
                $totalharga += $prd["harga"] * $prd["quantity"];
                }
                ?>
            </div>
            <div class="right-bar">
                <p><span>Subtotal</span> <span><?php echo $totalharga ?></span></p>
                <hr>
                <p><span>Tax (5%)</span> <span>$6</span></p>
                <hr>
                <p><span>Shipping</span> <span>$15</span></p>
                <hr>
                <p><span>Total</span> <span><?php echo $totalharga ?></span></p>
                <input type="hidden" name="" value="CheckOut">
                <input type="submit" name="pesan" value="CheckOut">
                <a href="https://wa.me/qr/FBHW3OIZWF5TF1"><i class="fa fa-shopping-cart"></i></a>
            </div>
        </div>
    </form>
</div>

</body>
</html>
