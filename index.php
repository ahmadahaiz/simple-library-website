<?php 
 	session_start();

    if( isset($_SESSION["login"]) ){
        header("Location: home.php");
        exit;
    }
    require 'dbcon.php';
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND status='Aktif'");

        //cek username
        if( mysqli_num_rows($result) === 1 ){
            
            //cek password
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"]) ){
                //set session
                $_SESSION['id_user']=$row['id_user'];
                $_SESSION["login"] = true;

                header("Location: home.php");
                exit;
            } else {header("location: index.php?pesan=gagal");
              }
        }else{
          header("location: index.php?pesan=gagal");
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
    <h3>Halaman Login</h3>
      <?php if( isset($_GET['pesan']) ): ?>
        <?php if($_GET['pesan'] == "gagal"): ?>
            <p style="color: red; font-style: italic;">username / password salah!</p>
        <?php endif; ?>
        <?php if ($_GET['pesan'] == "logout"): ?>
            <p style="color: white; font-style: italic;">Anda telah berhasil logout</p>
        <?php endif;?>
        <?php if ($_GET['pesan'] == "belum_login"): ?>
            <p style="color: red; font-style: italic;">Anda harus login terlebih dahulu!</p>
        <?php endif;?>      
      <?php endif;?>
        
    <div class="form-item">
		<input type="text" name="username" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="password" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>
 
  <div class="reminder">
    <p>Belum punya akun ? <a href="registrasi.php">Buat akun sekarang</a>
    <br><a href="admin/index.php">-> Login Sebagai Admin <-</a></p>
  </div>
  
</div>
</body>
</html>