<?php
  include "config.php";
   
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="style.css">

  <title>Login Form </title>
</head>
<body>
  <body>
  <div class="container">
    <form action="" method="POST" class="login-email">
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
      <div class="input-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
      </div>
      <div class="input-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>
      <div class="input-group">
        <button type="submit" class="btn btn-primary btn-block btn-flat" name="Login" title="Masuk Sistem">Login</button>
      </div>
    </form>
  </div>
</body>
</html>
  <br/>

<?php

if (isset($_POST['Login'])) {  
  //anti inject sql
  $username=mysqli_real_escape_string($koneksi,$_POST['username']);
  $password=mysqli_real_escape_string($koneksi,$_POST['password']);

  //query login
  $sql_login = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
  $query_login = mysqli_query($koneksi, $sql_login);
  $data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
  $jumlah_login = mysqli_num_rows($query_login);


  if ($jumlah_login ==1 ){
    session_start();
    $_SESSION["ses_id"]=$data_login["id_pm"];
    $_SESSION["ses_nama"]=$data_login["nama_pm"];
    $_SESSION["ses_username"]=$data_login["username"];
    $_SESSION["ses_password"]=$data_login["password"];
    $_SESSION["ses_level"]=$data_login["level"];
        
   header("location:index.php");
    }else{
   echo '<script>alert("login gagal")</script>';
    }
    }


