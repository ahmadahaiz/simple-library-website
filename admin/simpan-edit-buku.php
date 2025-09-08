<?php
    session_start();
    if( !isset($_SESSION["login"]) ){
        header("Location: index.php?pesan=belum_login");
        exit;
    } 
    
    include "dbcon.php";

    $noBuku = $_POST["noBuku"];
    $judulBuku = htmlspecialchars($_POST["judulBuku"]);
    $pengarang = htmlspecialchars($_POST["pengarang"]);
    $penerbit = htmlspecialchars($_POST["penerbit"]);
    $tahunTerbit = htmlspecialchars($_POST["tahunTerbit"]);
    
    $query = mysqli_query($con,"UPDATE buku SET noBuku='$noBuku', judulBuku='$judulBuku', pengarang='$pengarang', penerbit='$penerbit', tahunPenerbit='$tahunTerbit' WHERE noBuku = '$noBuku'");
    if($query){
        echo say("Data Anda Berhasil di Ubah","home.php?act=buku");
    }
?>