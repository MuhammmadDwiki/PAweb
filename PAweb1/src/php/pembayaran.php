<?php 
session_start();
require "../aksi/koneksi.php";

if(isset($_POST['pesan'])){
    if(isset($_POST['idkeranjang'])){
        $idkeranjangs = $_POST['idkeranjang'];
        $jumlahs = $_POST['jumlah'];
        $iduser = $_SESSION['id_akun'];
        
        foreach($idkeranjangs as $key => $idkeranjang){
            $jumlah = $jumlahs[$key];
            $ubah = mysqli_query($conn, "UPDATE keranjang set quantity = '$jumlah' where id_keranjang = '$idkeranjang'");
            $tambah = mysqli_query($conn, "INSERT INTO pembayaran 
            (id_pembayaran, id_keranjang, id_akun, jumlah, total)
            values ('', '$iidkeranjang', '$iduser', '$jumlah', '');
            '");
        }

    }
    else{
        echo "
            <script>
                document.location.href = '#';
            </script>
        ";
    }
}
echo "
    <script>
        document.location.href = '#';
    </script>
";
?>