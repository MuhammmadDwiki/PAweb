<?php
session_start();
require '../aksi/koneksi.php';

if ($_SESSION['logged'] == false) {
    header('Location:Formlogin.php');
    exit;
}

$id_produk = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM produk where id_produk = $id_produk");

$produk = [];

while ($row = mysqli_fetch_assoc($result)){
    $produk[] = $row;
}

$produk = $produk[0];

if (isset($_POST['edit'])) {
    $nama_barang = $_POST['nama_barang'];
    $type_barang = $_POST['type_barang'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['desk'];

    //upload gambar
    $img = $_FILES['gambar']['name'];
    $explode = explode(',',$img);
    $ekstensi = strtolower(end($explode));
    $gambar_barang = "$nama_barang.$ekstensi";
    $tmp = $_FILES['gambar']['tmp_name'];

    if (move_uploaded_file($tmp,'../assets/'.$gambar_barang)) {
            $result = mysqli_query($conn, "UPDATE produk SET nama_barang = '$nama_barang', type_barang = '$type_barang', stok = '$stok', harga = '$harga', gambar = '$gambar_barang' WHERE id_produk = '$id_produk' ");
            if ($result) {
                echo "
                <script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'dasbboardAdmin.php'
                </script>";
            }else {
                echo "
                <script>
                    alert('Data Gagal DiTambahkan!');
                    document.location.href = 'editpesanan.php'
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
    <link rel="stylesheet" href="../style/tambah.css">
    <title>Edit</title>
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
            <header>Edit</header>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="field input">
                    <label for="nama_barang">nama_barang</label>
                    <input type="text" name="nama_barang" value="<?php echo $produk['nama_barang']?>" id="nama_barang" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="stok">stok</label>
                    <input type="text" name="stok" value="<?php echo $produk['stok']?>" id="stok" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="harga">harga</label>
                    <input type="text" name="harga" value="<?php echo $produk['harga']?>" id="harga" autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="type_barang">Type Barang</label>
                    <?php echo $produk['type_barang']?>
                    <select name="type_barang" id="" required>
                    <option hidden>Brand</option>
                        <option value="spining rod">spining rod</option>
                        <option value="casting rod">casting rod</option>
                        <option value="bottom fishing rod">bottom fishing rod</option>
                        <option value="fly rod">fly rod</option>
                        <option value="jigging rod">jigging rod</option>
                        <option value="spin-cast rod">spin-cast rod</option>
                    </select>
                </div>

                <div class="field input">
                    <label for="desk">Deskripsi</label>
                    <textarea name="desk" id="desk" cols="30" rows="10" placeholder = "Deskripsi" autocomplete="off" required></textarea>
                </div>

                <div class="field input">
                    <label for="gambar">Upload Gambar</label>
                    <input type="file" name="gambar" value="<?php echo $produk['gambar']?>" autocomplete="off" required>
                </div>
                
                <div class="field">
                    <input type="submit" class="btn" name="edit" value="Edit Data" required>
                </div>
            </form>
        </div>
    </div>
</body>
</html>