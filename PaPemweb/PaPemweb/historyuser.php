<?php
session_start();
require "koneksi.php";

if($_SESSION['username'] == "admin"){
    $username = $_SESSION['username'];
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
        $result = mysqli_query($conn, "SELECT * from pembayaran pbr
        join user usr on pbr.id_user = usr.id_user
        join game gm on pbr.id_game = gm.id_game
        where usr.username LIKE '%$keyword%'");
    } else {
        $result = mysqli_query($conn, "SELECT * from pembayaran pbr
        join user usr on pbr.id_user = usr.id_user
        join game gm on pbr.id_game = gm.id_game
        order by pbr.id_game
         ");
    }
}
else if(isset($_SESSION['login'])){
    $username = $_SESSION['username'];
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
        $result = mysqli_query($conn, "SELECT * from pembayaran pbr
        join user usr on pbr.id_user = usr.id_user
        join game gm on pbr.id_game = gm.id_game
        where gm.nama_game LIKE '%$keyword%' and usr.username = '$username'");
    } else {
        $result = mysqli_query($conn, "SELECT * from pembayaran pbr
        join user usr on pbr.id_user = usr.id_user
        join game gm on pbr.id_game = gm.id_game
        where usr.username = '$username'
         ");
    }
}
else{
    header('Location: login.php');
    exit;
}


$mahasiswa = [];

while ($row = mysqli_fetch_assoc($result)) {
    $mahasiswa[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="historyuser.css">
    <title>Pertemuan 5 - CRUD</title>
</head>

<body>
    <div class="Tambah">
        <a href="formadmin.php">Kembali</a>
        <a href="tambah.php">Tambah</a>
    </div>
    <h1>Data User</h1>
    <form action="" method="get">
        <input type="text" name="keyword" id="">
        <!-- <button type="submit" name="cari">Cari</button> -->
    </form>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama Game</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Game ID</th>
            <th>Tanggal Pembayaran</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1;
        foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td> <?= $i; ?> </td>
                <td> <?php echo $mhs["username"] ?> </td>
                <td> <?= $mhs["nama_game"] ?> </td>
                <td> <?php echo $mhs["produk"] ?> </td>
                <td> <?php echo $mhs["jumlah"] ?> </td>
                <td> <?php echo $mhs["total"] ?> </td>
                <td> <?= $mhs["gameid"] ?> </td>
                <td> <?= $mhs["tanggal_bayar"] ?> </td>
                <td> <?= $mhs["email"] ?> </td>
                <td><a href="edit.php?id=<?=$mhs["id_game"];?>">Lihat Struk</a></td>
            </tr>
        <?php $i++;
        endforeach; ?>
    </table>
    <a href="logout.php">logout</a>
</body>
</html>