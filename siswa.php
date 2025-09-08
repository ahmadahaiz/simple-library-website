<?php           
        $q = mysqli_query($con,"SELECT * FROM siswa");
            function cari($keyword) {
                global $con;
                $query = "SELECT * FROM siswa
                            WHERE
                           NIS LIKE '%$keyword%' OR
                           nama LIKE '%$keyword%' OR
                           kelas LIKE '%$keyword%' OR
                           jk LIKE '%$keyword%' OR
                           alamat LIKE '%$keyword%'
                        ";
                return mysqli_query($con,$query);               
                }
                if(isset($_POST["cari"]) ){
                    $q = cari($_POST["keyword"]);
            }       
?>       
        <h1 align="center">Anggota Siswa Perpustakaan</h1>
        <table align="center" cellspacing="0" width="70%" style="margin: auto; margin-top: 64px; font-size: 16px;">
            <form action="simpan-siswa.php" method="POST">
            <tr>
                <td colspan="2"><h2 align="center ">Tambah Siswa</h2></td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>: <input type="number" name="NIS" class="input"></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td>: <input type="text" name="nama" class="input"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>: <input type="text" name="kelas" class="input"></td>
            </tr> 
            <tr>
                <td>Jenis Kelamin</td>
                <td>: <select name="jk" class="input">
                    <option value="-">-PILIH-</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <textarea class="text-area" name="alamat"></textarea></td>
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
        <table align="center" cellspacing="0" width="100%" style="margin-top: 32px;">
            <tr>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
            </tr>
            <?php
                while($a = mysqli_fetch_array($q)){
            ?>
            <tr>
                <td style="text-align: center;"><?= $a['NIS']?></td>
                <td style="text-align: center;"><?= $a['nama']?></td>
                <td style="text-align: center;"><?= $a['kelas']?></td>
                <td style="text-align: center;"><?= $a['jk']?></td>
                <td style="text-align: center;"><?= $a['alamat']?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <?php
                if(isset($_POST["cari"])){
                echo "<br><a href='home.php?act=siswa' class='cari' style='text-decoration: none;'> < < Kembali</a>";
                }
            ?>