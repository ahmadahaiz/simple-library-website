<?php
    if(isset($_GET['kon'])){
        $id_peminjaman = $_GET['kon'];
        $q = mysqli_query($con,"UPDATE peminjaman SET tglKembali=NOW() WHERE id_peminjaman=$id_peminjaman");
        if($q){
            echo say("Konfirmasi Berhasil","home.php?act=peminjaman");
        }
    }

    $q = mysqli_query($con,"SELECT * FROM ( ( peminjaman INNER JOIN siswa ON peminjaman.NIS=siswa.NIS ) INNER JOIN buku ON peminjaman.noBuku=buku.noBuku )");
            function cari($keyword) {
                global $con;
                $query = "SELECT * FROM ( ( peminjaman INNER JOIN siswa ON peminjaman.NIS=siswa.NIS ) INNER JOIN buku ON peminjaman.noBuku=buku.noBuku )
                            WHERE
                        siswa.NIS LIKE '%$keyword%' OR
                        siswa.Nama LIKE '%$keyword%' OR
                        siswa.kelas LIKE '%$keyword%' OR
                        buku.noBuku LIKE '%$keyword%' OR
                        buku.judulBuku LIKE '%$keyword%' OR
                        jumlah LIKE '%$keyword%' OR
                        tglPinjam LIKE '%$keyword%' OR
                        tglKembali LIKE '%$keyword%'
                        ";
                return mysqli_query($con,$query);               
                }    
            if(isset($_POST["cari"]) ){
                $q = cari($_POST["keyword"]);
            }
?>
        <h1 align="center">Adminisrasi Peminjaman</h1>
        <table align="center" cellspacing="0" width="70%" style="margin: auto; margin-top: 64px; font-size: 16px;">
            <form action="simpan-pinjam.php" method="POST">
            <tr>
                <td colspan="2"><h2 align="center ">Tambah Peminjaman</h2></td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>: <input type="text" name="NIS" class="input"></td>
            </tr>
            <tr>
                <td>Kode Buku</td>
                <td>: <input type="text" name="noBuku" class="input"></td>
            </tr>
            <tr>
                <td>Jumlah Buku</td>
                <td>: <input type="text" name="jumlah" class="input"></td>
            </tr> 
            <tr>
                <td colspan="2" style="padding-bottom: 16px;">
                    <input type="reset" class="submit" value="Reset">
                    <input type="submit" class="submit right" value="Tambah">
                </td>
            </tr>
            </form>
        </table>
            <br>
            <form action="" method="POST">
            <input type="text" name="keyword" class="cari" placeholder="Silahkan Masukkan Keyword Pencarian..." autocomplete="off">
            <input type="submit" class="submit" name="cari" value="Cari">
            </form>
        <?php
            if (isset($_POST["cari"])){
            $searching = @$_POST['keyword'];
            echo "<br><b class='cari'>Hasil Penelusuran : $searching</b>";
            }
        ?>
        <div class="tabel">
        <table align="center" celspacing="0" width="100%" style="margin-top: 32px;">
            <tr>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Jumlah Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
            </tr>
            <?php
                while($a = mysqli_fetch_array($q)){
            ?>
            <tr>
                <td style="text-align: center;"><?= $a['NIS']?></td>
                <td style="text-align: center;"><?= $a['nama']?></td>
                <td style="text-align: center;"><?= $a['kelas']?></td>
                <td style="text-align: center;"><?= $a['noBuku']?></td>
                <td style="text-align: center;"><?= $a['judulBuku']?></td>
                <td style="text-align: center;"><?= $a['jumlah']?></td>
                <td style="text-align: center;"><?= $a['tglPinjam']?></td>
                <td style="text-align: center;"><?= $a['tglKembali']?></td>
            </tr>
            <?php
                }
            ?>
            </table>
            <?php
                if(isset($_POST["cari"])){
                echo "<br><a href='home.php?act=peminjaman' class='cari' style='text-decoration: none;'> < < Kembali</a>";
                }
            ?>
