<?php 
session_start();
require "koneksi.php";

date_default_timezone_set("Asia/Makassar");
$date = date('Y/m/d');

if (isset($_GET["id"])) {
    $idgame = $_GET["id"];
    $result = mysqli_query($conn, "select * from game where id_game = '$idgame'");
    $game = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $game[] = $row;
    }
    $game = $game[0];
    
    if(mysqli_num_rows($result) === 0){
        header("Location: formadmin.php");
        exit;
    }
    
    if (isset($_POST["ubah"])){
        $nama = $_POST["nama_game"];
        $produk = $_POST["produk"];
        $harga = $_POST["harga"]; 
    
        $results = mysqli_query($conn, "update game set nama_game = '$nama', produk = '$produk', harga = '$harga' where id_game = '$idgame'");
        if ($results) {
            echo "
                    <script>
                        alert('Data Berhasil Diubah!');
                        document.location.href = 'formadmin.php';
                    </script>
                ";
        }
        else {
            echo error_log($result) . "
            <script>
                alert('Data Gagal Diedit!');
                document.location.href = 'formadmin.php';
            </script>
            ";
        }
    }
    
}
else{
    header("Location: formadmin.php");
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div>
        <h1>Ubah Data</h1>
        <form action="" method="post">
            <label for="">Masukkan Nama Game</label>
            <input type="text" value="<?php echo $game["nama_game"]?>" name="nama_game"><br>
            <label for="">Produk</label>
            <input type="text" value="<?php echo $game["produk"]?>" name="produk">
            <label for="">Harga</label>
            <input type="number" value="<?php echo $game["harga"]?>" name="harga">
            <input type="submit" name="ubah" value="ubah">
        </form>
    </div>
    <a href="index.php">kembali</a>
    
</body>
</html>