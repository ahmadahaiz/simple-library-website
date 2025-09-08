<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: index.php?pesan=belum_login");
    exit;
} 
include 'dbcon.php';
 ?>

<html>
<head>
  <title>Perpustakaan</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<div class="container"> 
  <div class="kiri">
    <ul>
      <a href="home.php?"><li>Menu</li></a>
      <a href="home.php?act=buku"><li>Buku</li></a>
      <a href="home.php?act=peminjaman"><li>Peminjaman</li></a>
      <a href="home.php?act=siswa"><li>Siswa</li></a>  
      <br>
      <a href="logout.php" onclick="return confirm('Yakin Anda ingin melakukan logout ?');"><li>Log out</li></a>
    </ul>
  </div>
  <div class="kanan">
      <?php
        if(isset($_GET['act'])){
          if($_GET['act'] == 'buku')
            include 'buku.php';
          else
            if($_GET['act'] == 'peminjaman')
            include 'peminjaman.php';
          else
            if($_GET['act'] == 'siswa')
            include 'siswa.php';
        } elseif(isset($_GET['editBuku'])){
            include 'editBuku.php';
        } elseif(isset($_GET['editSiswa'])){
          include 'editSiswa.php';
        } else
            include 'depan.php';
      ?>
  </div>
</div>

</body>
</html>