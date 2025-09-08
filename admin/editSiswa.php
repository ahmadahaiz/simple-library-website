    <h1 align="center">Pengubahan Data Siswa</h1>
    <table align="center" cellspacing="0" width="70%" style="margin: auto; margin-top: 64px; font-size: 16px;">
        <form action="simpan-edit-siswa.php" method="POST">
            <tr>
                <td colspan="2"><h2 align="center ">Edit Siswa</h2></td>
            </tr>
            <?php
                $NIS = $_GET['editSiswa'];
                $q = mysqli_query($con,"SELECT * FROM siswa WHERE NIS='$NIS'");
                $a = mysqli_fetch_array($q); 
            ?>
            <input type="hidden" name="NIS" value="<?= $a['NIS'];?>">
            <tr>
                <td>Nama</td>
                <td>: <input type="text" name="nama" class="input" value="<?= $a['nama'];?>"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>: <input type="text" name="kelas" class="input" value="<?= $a['kelas'];?>"></td>
            </tr> 
            <tr>
                <td>Alamat</td>
                <td>: <input type="text" name="alamat" class="input" value="<?= $a['alamat'];?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="padding-bottom: 16px;">
                    <input type="reset" class="submit" value="Reset">
                    <input type="submit" class="submit right" value="Ubah">
                </td>
            </tr>
        </form>
    </table>
    <br><a href="home.php?act=siswa" class="cari" style="text-decoration: none;"> < < Kembali</a>