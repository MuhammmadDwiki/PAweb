<?php
session_start();
require "koneksi.php";

if($_SESSION['username'] != "admin"){
    header('Location: login.php');
    exit;
}

if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    $result = mysqli_query($conn, "SELECT * FROM game WHERE nama_game LIKE '%$keyword%'");
} else {
    $result = mysqli_query($conn, "SELECT * FROM game");
}

$game = [];

while ($row = mysqli_fetch_assoc($result)) {
    $game[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="formadmin.css">
    <title>Form Admin</title>
</head>

<body>
    <div class="Tambah">
        <a href="tambah.php">Tambah</a>
        <a href="historyuser.php">Riwayat User</a>
    </div>
    <h1>Data game</h1>
    <form action="" method="get">
        <input type="text" name="keyword" id="">
        <!-- <button type="submit" name="cari">Cari</button> -->
    </form>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Game</th>
            <th>Produl</th>
            <th>Harga</th>
            <!-- <th>Gambar</th> -->
            <th colspan="2">Aksi</th>
        </tr>
        <?php $i = 1;
        foreach ($game as $gm) : ?>
            <tr>
                <td> <?= $i; ?> </td>
                <td> <?php echo $gm["nama_game"] ?> </td>
                <td> <?= $gm["produk"] ?> </td>
                <td> <?= $gm["harga"] ?> </td>
                <!-- <td> <img src="img/<?= $gm['gambar'] ?>" alt="ini gambar" width="50px" height="50px"> </td> -->
                <td><a href="edit.php?id=<?=$gm["id_game"];?>">Edit</a></td>
                <td><a href="hapus.php?id=<?=$gm["id_game"];?>" onclick="return confirm('Apa Anda Yakin ingin menghapus data ini ?')">hapus</a></td>
            </tr>
        <?php $i++;
        endforeach; ?>
    </table>
    <a href="logout.php">logout</a>
</body>
</html>