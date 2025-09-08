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
        <h1 align="center">Daftar Buku Perpustakaan</h1>
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
            </tr>
            <?php while($a = mysqli_fetch_array($q)){ ?>
            <tr>
                <td style="text-align: center;"><?= $a['noBuku']?></td>
                <td style="text-align: center;"><?= $a['judulBuku']?></td>
                <td style="text-align: center;"><?= $a['pengarang']?></td>
                <td style="text-align: center;"><?= $a['penerbit']?></td>
                <td style="text-align: center;"><?= $a['tahunPenerbit']?></td>
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
        