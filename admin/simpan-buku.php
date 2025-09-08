<?php
    session_start();
    if( !isset($_SESSION["login"]) ){
        header("Location: index.php?pesan=belum_login");
        exit;
    } 
    
    include "dbcon.php";

    $noBuku = htmlspecialchars($_POST["noBuku"]);
    $judulBuku = htmlspecialchars($_POST["judulBuku"]);
    $pengarang = htmlspecialchars($_POST["pengarang"]);
    $penerbit = htmlspecialchars($_POST["penerbit"]);
    $tahunTerbit = htmlspecialchars($_POST["tahunTerbit"]);
    $result=mysqli_query($con,"SELECT noBuku FROM buku WHERE noBuku = '$noBuku'");
        
        if( mysqli_fetch_assoc($result) ){
            echo say("Kode Buku Sudah Terdaftar, Silahkan Coba lagi !","home.php?act=buku");
        }
    
    $query = mysqli_query($con,"INSERT INTO buku VALUES('$noBuku','$judulBuku','$pengarang','$penerbit','$tahunTerbit')");
    if($query){
        echo say("Data Anda Berhasil di Masukkan","home.php?act=buku");
    }
?>