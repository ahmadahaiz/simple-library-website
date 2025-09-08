<?php
$con = mysqli_connect("localhost","root","","perpustakaan");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  function say($pesan, $lokasi){
      $a = "
            <script>
            window.alert('$pesan');
            window.location='$lokasi';
            </script>
        ";
       return $a; 
  }

  function registrasi($data) {
    global $con;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($con,$data["password"]);
    $password2 = mysqli_real_escape_string($con,$data["password2"]);
    $nama = stripslashes($data["nama"]);
    //cek username sudah ada atau belum
    $result=mysqli_query($con,"SELECT username FROM user WHERE username = '$username'");
    
    if( mysqli_fetch_assoc($result) ){
        echo "<script>
                alert('username sudah terdaftar!');
        </script>";
    return false;
    }

    //cek konfirmasi password
    if($password !== $password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke database
    mysqli_query($con, "INSERT INTO user VALUES('','$nama','$username','$password','Aktif')");
    return mysqli_affected_rows($con);
}
?>
