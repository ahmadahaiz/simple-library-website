<?php
require 'dbcon.php';

if(isset($_POST["register"]) ){
    if( registrasi($_POST) > 0 ){
        echo "<script>
                alert('user baru berhasil ditambahkan!');
            </script>";
    } else{
        echo mysqli_error($con);
    }
}

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="index">
<div class="form-wrapper">
  
  <form action="" method="post">
    <h3>Halaman Registrasi</h3>
	
    <div class="form-item">
		<input type="text" name="nama" required="required" placeholder="Nama Anda" autofocus required></input>
    </div>

    <div class="form-item">
		<input type="text" name="username" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="password" required="required" placeholder="Password" required></input>
    </div>

    <div class="form-item">
		<input type="password" name="password2" required="required" placeholder="Konfirmasi Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Regitrasi" name="register" value="Registrasi"></input>
    </div>
  </form>
 
  <div class="reminder">
      <a href="index.php"> < < Kembali </a></p>
  </div>
  
</div>

</body>
</html>