<?php           
        $q = mysqli_query($con,"SELECT * FROM buku");
            function cari($keyword) {
                global $con;
                $query = "SELECT * FROM buku
                            WHERE
                           noBuku LIKE '%$keyword%' OR
                           judulBuku LIKE '%$keyword%' OR
                           pengarang LIKE '%$keyword%' OR
                           penerbit LIKE '%$keyword%' OR
                           tahunPenerbit LIKE '%$keyword%'
                        ";
                return mysqli_query($con,$query);               
                }
                if(isset($_POST["cari"]) ){
                    $q = cari($_POST["keyword"]);
            }       
?>
        <h1 align="center">Adminisrasi Buku</h1>
        <table align="center" cellspacing="0" width="70%" style="margin: auto; margin-top: 64px; font-size: 16px;">
            <form action="simpan-buku.php" method="POST">
            <tr>
                <td colspan="2"><h2 align="center ">Tambah Buku</h2></td>
            </tr>
            <tr>
                <td>No Buku</td>
                <td>: <input type="text" name="noBuku" class="input"></td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td>: <input type="text" name="judulBuku" class="input"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td>: <input type="text" name="pengarang" class="input"></td>
            </tr> 
            <tr>
                <td>Penerbit</td>
                <td>: <input type="text" name="penerbit" class="input"></td>
            </tr>
            <tr>
                <td>Tahun Penerbit</td>
                <td>: <input type="date" name="tahunTerbit" class="input"></td>
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
                <th>No Buku</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Action</th>
            </tr>
            <?php while($a = mysqli_fetch_array($q)){ ?>
            <tr>
                <td style="text-align: center;"><?= $a['noBuku']?></td>
                <td style="text-align: center;"><?= $a['judulBuku']?></td>
                <td style="text-align: center;"><?= $a['pengarang']?></td>
                <td style="text-align: center;"><?= $a['penerbit']?></td>
                <td style="text-align: center;"><?= $a['tahunPenerbit']?></td>
                <td style="text-align: center;"><a href="?editBuku=<?=$a['noBuku']?>">Ubah</a> <a href="hapus-buku.php?id=<?= $a["noBuku"]; ?>" onclick="
                    return confirm('Data ini akan Anda hapus. Yakin ?');">Hapus</a></td>
            </tr>
            <?php
                }
            ?>
            </table>
            <?php
                if(isset($_POST["cari"])){
                echo "<br><a href='home.php?act=buku' class='cari' style='text-decoration: none;'> < < Kembali</a>";
                }
            ?>
        