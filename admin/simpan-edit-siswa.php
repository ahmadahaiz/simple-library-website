<?php
    session_start();
    if( !isset($_SESSION["login"]) ){
        header("Location: index.php?pesan=belum_login");
        exit;
    } 
    
    include "dbcon.php";

    $NIS = $_POST["NIS"];
    $nama = htmlspecialchars($_POST["nama"]);
    $kelas = htmlspecialchars($_POST["kelas"]);
    $alamat = htmlspecialchars($_POST["alamat"]);    
    $query = mysqli_query($con,"UPDATE siswa SET nama='$nama', kelas='$kelas', alamat='$alamat' WHERE NIS='$NIS'");
    if($query){
        echo say("Data Anda Berhasil di Ubah","home.php?act=siswa");
    }
?>