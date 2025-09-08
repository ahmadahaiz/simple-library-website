<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: index.php?pesan=belum_login");
    exit;
} 

require 'dbcon.php';
    $id = $_GET["id"];

    function hapus($id) {
        global $con;
        mysqli_query($con,"DELETE FROM siswa WHERE NIS = $id");
        return mysqli_affected_rows($con);
    }

    if( hapus($id)>0) {
        echo "
            <script>
                alert('Data Anda Berhasil Dihapus');
                document.location.href = 'home.php?act=siswa';
            </script>
        ";
    }
    else {
        echo "
            <script>
                alert('Data Anda gagal Dihapus');
                document.location.href = 'home.php?act=siswa';
            </script>
        ";
    }

?>