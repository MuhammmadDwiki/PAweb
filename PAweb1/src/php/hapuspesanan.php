<?php
session_start();
require "../aksi/koneksi.php";
$id_produk = $_GET['id'];

$produk = [];

$result = mysqli_query($conn, "SELECT * FROM produk where id_produk = '$id_produk'");
while ($row = mysqli_fetch_assoc($result)) {
    $produk[] = $row;
}

foreach($produk as $mc) {
    $status=unlink('../assets/'.$mc['gambar']);
    if ($status) {
        $result = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id_produk'");
        echo "
        <script>
            alert('Data Berhasil Hapus!');
            document.location.href = 'dasbboardAdmin.php'
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Hapus!');
            document.location.href = 'dasbboardAdmin.php'
        </script>";
    }
}


?>