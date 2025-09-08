<?php
    session_start();
    if( !isset($_SESSION["login"]) ){
        header("Location: index.php?pesan=belum_login");
        exit;
    } 
    
    include "dbcon.php";

    $NIS = strtolower(htmlspecialchars($_POST["NIS"]));
    $noBuku = htmlspecialchars($_POST["noBuku"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);
    $result1 =mysqli_query($con,"SELECT noBuku FROM buku WHERE noBuku = '$noBuku'");
    $result2=mysqli_query($con,"SELECT NIS FROM siswa WHERE NIS = '$NIS'");
    
    if( !mysqli_fetch_assoc($result2) ){
        echo say("NIS Anda belum terdaftar, Silahkan daftar terlebih dahulu !","home.php?act=peminjaman");
    }
    elseif( !mysqli_fetch_assoc($result1) ){
        echo say("Kode buku tersebut tidak tersedia, Silahkan pilih kode buku yang telah tersedia di menu buku !","home.php?act=peminjaman");
    }

    $query = mysqli_query($con,"INSERT INTO peminjaman VALUES('','$NIS','$noBuku','$jumlah', NOW(), '')");
    if($query){
        echo say("Data Anda Berhasil di Masukkan","home.php?act=peminjaman");
    }
?>