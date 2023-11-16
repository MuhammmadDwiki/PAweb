<?php
session_start();
require '../aksi/koneksi.php';

if ($_SESSION['username'] != "admin") {
    header('Location:Formlogin.php');
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM produk");

$produk = [];

while ($row = mysqli_fetch_assoc($result)){
    $produk[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Staff</title>
    <link rel="stylesheet" href="../style/tablebaru.css">
</head>
<body>  
    <div class="dashboard">
        <main class="dash-container">
            <section class="dash-main">
                <h1>Selamat Datang Admin</h1>
                <p>Ini Pesanan Anda</p>
                <p>Hari ini : <?php date_default_timezone_set("Asia/Makassar"); echo date('l, d M Y | h:i:sa e ')?></p>
                <hr><br>
                <div class="leading-btn">
                    <a href = "addpesanan.php"><button class="add-btn">Tambah</button></a>
                    <a href = "logout.php"><button class="add-btn">LogOut</button></a>
                </div><br>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>   
                            <th>Type Barang</th>
                            <th>stok</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Upload Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($produk as $pnc) :?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $pnc["nama_barang"] ?></td>
                            <td><?php echo $pnc["type_barang"] ?></td>
                            <td><?php echo $pnc["stok"] ?></td>
                            <td><?php echo $pnc["harga"] ?></td>
                            <td><?php echo $pnc["desk"] ?></td>
                            <td> <img src="../assets/<?= $pnc['gambar']?>" alt="ini gambar" width="50px" height="50px"></td>
                            <td class="action">
                                <a href="editpesanan.php?id=<?php echo $pnc["id_produk"] ?>"><button class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" id_produkth="24" fill="white"><path d="M200-200h56l345-345-56-56-345 345v56Zm572-403L602-771l56-56q23-23 56.5-23t56.5 23l56 56q23 23 24 55.5T829-660l-57 57Zm-58 59L290-120H120v-170l424-424 170 170Zm-141-29-28-28 56 56-28-28Z"/></svg></button></a>
                                <a href="hapuspesanan.php?id=<?php echo $pnc["id_produk"] ?>"><button name="hapus" class="delete-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 9id_produk 960" width="24" fill="white"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></button></a>
                            </td>
                        </tr>
                        <?php $i++; endforeach;?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>