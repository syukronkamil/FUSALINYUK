<?php
include_once('function.php');
$database = new database();
if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    if ($_POST['konfirmasi_password'] == $_POST['password']) {
        if ($database->register($nama,$email,$no_hp,$password)) {
            echo '<div class="alert alert-warning" role="alert">';
            echo 'Berhasil registrasi';
            echo '</div>';
        }
    }
    else {
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Gagal registrasi';
        echo '<br>';
        echo 'Periksa kembali password anda';
        echo '</div>';
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="shortcut icon" href="../assets/img/favicon.png">
    <title>Register</title>
    
  </head>
  <body>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



    <nav class="navbar navbar-expand-sm" style="background-color: teal;">
            <a class="navbar-brand"><img src="../assets/img/logo.png" height="60px" width="150px"></a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
    </ul>
    
    <form class="form-inline">
        <a class="navbar-brand ; text-light" href="login.php">Login</a>
        <a class="btn btn-outline-dark my-2 my-sm-0 text-light"  href="#">Register</a>
    
  </form>
    
  </div>
</nav>

 <!-- content -->
 <div class="container my-3">
        <div class="card my-4 mx-auto px-3" style="width: 26rem;">
        
            <div class="card-body">
                <h5 class="card-title" align="center">Registrasi</h5>
                <hr></hr>
                <form method="post" action="">
                    <div class="form-group ml-5">
                        <label class="text-info">Nama</label>
                        <input type="text" class="form-control" name="nama" style="width:80%" placeholder="Masukkan Nama Lengkap">
                    </div>
                    <div class="form-group ml-5">
                        <label class="text-info">E-mail</label>
                        <input type="email" class="form-control" name="email" style="width:80%" placeholder="Masukkan Alamat E-mail">
                    </div>
                    <div class="form-group ml-5">
                        <label class="text-info">No. Handphone</label>
                        <input type="number" class="form-control" name="no_hp" style="width:80%" placeholder="Masukkan Nomor Handphone">
                    </div>
                    <div class="form-group ml-5">
                        <label class="text-info">Kata Sandi</label>
                        <input type="password" class="form-control" name="password" style="width:80%" placeholder="Buat Kata Sandi">
                    </div>
                    <div class="form-group ml-5">
                        <label class="text-info">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control" name="konfirmasi_password" style="width:80%" placeholder="Konfirmasi Kata Sandi">
                    </div>
                    <div class="form-group ml-2" align="center">
                        <button type="submit" name="register" class="btn btn-info mb-2">Daftar</button>
                        <br>
                        <p class="text-info">Sudah punya akun? <a href="login.php">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- end of content -->
</body>
</html>
