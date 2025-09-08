<?php
    session_start();
    if( !isset($_SESSION["login"]) ){
        header("Location: index.php?pesan=belum_login");
        exit;
    } 
    
    include "dbcon.php";

    $NIS = htmlspecialchars($_POST["NIS"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $kelas = htmlspecialchars($_POST["kelas"]);
    $jk = htmlspecialchars($_POST["jk"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $result=mysqli_query($con,"SELECT NIS FROM siswa WHERE NIS = '$NIS'");
        
        if( mysqli_fetch_assoc($result) ){
            echo say("NIS Sudah Terdaftar, Silahkan Coba lagi !","home.php?act=siswa");
        }
    
    $query = mysqli_query($con,"INSERT INTO siswa VALUES('$NIS','$nama','$kelas','$jk','$alamat')");
    if($query){
        echo say("Data Anda Berhasil di Masukkan","home.php?act=siswa");
    }
?>