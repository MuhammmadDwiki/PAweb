<?php 
session_start();
require "koneksi.php";

date_default_timezone_set("Asia/Makassar");
$date = date('Y/m/d');
    
if (isset($_POST["tambah"])){
    $nama = $_POST["nama_game"];
    $produk = $_POST["produk"];
    $harga = $_POST["harga"]; 

    $results = mysqli_query($conn, "insert into game (id_game, nama_game, produk, harga) values ('', '$nama', '$produk', '$harga')");
    if ($results) {
        echo "
                <script>
                    alert('Data Berhasil Ditambahkan! dan file berhasil di upload');
                    document.location.href = 'formadmin.php';
                </script>
            ";
    }
    else {
        echo error_log($results) . "
        <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href = 'tambah.php';
        </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="tambah.css">
    <title>Document</title>
    
</head>
<body>

    <div>
        <h1>Tambah Data</h1>
        <form action="" method="post">
            <label for="">Masukkan Nama Game</label>
            <input type="text" value="Nama Game" name="nama_game"><br>
            <label for="">Produk</label>
            <input type="text" value="Produk" name="produk">
            <label for="">Harga</label>
            <input type="number" value="Harga" name="harga">
            <input type="submit" name="tambah" value="tambah">
        </form>
    </div>
    <a href="formadmin.php">kembali</a>
    
</body>
</html>