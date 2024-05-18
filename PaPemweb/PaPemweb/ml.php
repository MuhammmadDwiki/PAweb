<?php
session_start();
require "koneksi.php";

if(!isset($_SESSION['login'])){
    $notlogin = true;
}


$result = mysqli_query($conn, "SELECT * FROM game where nama_game = 'mobile legend' ");

$valorant = [];

while ($row = mysqli_fetch_assoc($result)) {
    $valorant[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOBILE LEGEND</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Mobile Legend</h1>
<div class="tes">
    <?php $i = 1;
    foreach ($valorant as $vlr) : ?>
        <div id="<?= "element",$i ?>" class="custom-div">
            <p><?= $vlr["produk"] ?> Diamond</p>
            <p>Harga <?= $vlr["harga"] ?> Ribu</p>
            <?php
            if (isset($notlogin)) { ?>
                <a style="display: none;" href="pesan.php?id=<?=$vlr["id_game"];?>">Beli</a>
                <a style="display: none;" href="keranjang.php?id=<?=$vlr["id_game"];?>">Keranjang</a>
            <?php 
            } else{ ?>
                <a href="pesan.php?id=<?=$vlr["id_game"];?>">Beli</a>
                <a href="keranjang.php?id=<?=$vlr["id_game"];?>">Keranjang</a>
            <?php } ?>
        </div>
        <?php $i++;
    endforeach; ?>
</div>
<a href="index.php">kembali</a>
<a href="logout.php">logout</a>
</body>
</html>