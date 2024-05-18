<?php 
session_start();
require "koneksi.php";

date_default_timezone_set("Asia/Makassar");
$date = date('Y/m/d');

if (isset($_GET["id"])) {
    $idgame = $_GET["id"];
    
    
    $result = mysqli_query($conn, "delete from game where id_game = '$idgame'"); 

    $cek = mysqli_query($conn, "select * from game where id_game = '$idgame'");
    if(mysqli_num_rows($cek) === 0){
        header("Location: formadmin.php");
        exit;
    }
}
else{
    header("Location: formadmin.php");
}