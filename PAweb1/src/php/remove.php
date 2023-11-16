<?php
session_start();
require "../aksi/koneksi.php";
$id_keranjang = $_GET['id'];

$keranjang = [];

$result = mysqli_query($conn, "SELECT * FROM keranjang where id_keranjang = '$id_keranjang'");
while ($row = mysqli_fetch_assoc($result)) {
    $keranjang[] = $row;
}

foreach($keranjang as $mc) {
    $result = mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'");
    echo "
    <script>
        alert('Data Berhasil Hapus!');
        document.location.href = 'cart.php';
    </script>";
    echo "
    <script>
        alert('Data Gagal Hapus!');
        document.location.href = 'cart.php'
    </script>";
}


?>