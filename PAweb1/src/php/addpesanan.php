<?php
session_start();
require '../aksi/koneksi.php';

if ($_SESSION['logged'] == false) {
    header('Location:Formlogin.php');
    exit;
}

if (isset($_POST['submit'])) {
    $nama_barang = $_POST['nama_barang'];
    $type_barang = $_POST['type_barang'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['desk'];
    
    // upload gambar
    $img = $_FILES['gambar']['name'];
    $explode = explode(',',$img);
    $ekstensi = strtolower(end($explode));
    $gambar_barang = "$nama_barang.$ekstensi";
    $tmp = $_FILES['gambar']['tmp_name'];

    if (move_uploaded_file($tmp,'../assets/'.$gambar_barang)) {
        $result = mysqli_query($conn, "INSERT INTO produk (id_produk, nama_barang, type_barang, stok, harga, desk, gambar) 
        values('', '$nama_barang', '$type_barang', '$stok', '$harga', '$deskripsi', '$gambar_barang')");
        if ($result) {
            echo "
            <script>
                alert('Data Berhasil DiTambahkan!');
                document.location.href = 'dasbboardAdmin.php'
            </script>";
        }else {
            echo "
            <script>
                alert('Data Gagal DiTambahkan!');
                document.location.href = 'addpesanan.php'
            </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Pesanan</title>
    <link rel="stylesheet" href="../style/tambah.css">
</head>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type-number] {
        -moz-appearance: textfield;
    }
</style>

<body>
    <div class="container">
        <div class="box form-box">
            <header>Pesanan</header>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="field input">
                    <label for="_barang_barang">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" placeholder = "Enter Your Name" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="type_barang">type_barang</label>
                    <select name="type_barang" id="" required>
                    <option hidden>Brand</option>
                        <option value="spining rod">Joran</option>
                        <option value="casting rod">Reel</option>
                        <option value="bottom fishing rod">Senar</option>
                        <option value="fly rod">Kail</option>
                        <option value="jigging rod">Umpan</option>
                        <option value="spin-cast rod">lain lain</option>
                    </select>
                </div>

                <div class="field input">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" id="stok" placeholder = "Stok" autocomplete="off" required>
                </div>
                

                <div class="field input">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" id="harga" placeholder = "Harga" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="desk">Deskripsi</label>
                    <textarea name="desk" id="desk" cols="30" rows="10" placeholder = "Deskripsi" autocomplete="off" required></textarea>
                </div>

                <div class="field input">
                    <label for="gambar">Upload Gambar</label>
                    <input type="file" name="gambar" id=""> <br>
                </div>
                
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Tambah Data" required>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

