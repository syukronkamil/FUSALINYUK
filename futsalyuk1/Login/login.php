<?php
session_start();
include '../config/connection.php';
include_once('function.php');
$database = new database();

if (isset($_SESSION['is_login'])) {
    header('location:home.php');
    
}

if (isset($_COOKIE['email'])) {
    $database->relogin($_COOKIE['email']);
    header('location:home.php');
   
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (isset($_POST['remember'])) {
        $remember = TRUE;
    }
    else {
        $remember = FALSE;
    }

    if ($database->login($email,$password,$remember)) {
        header('location:home.php');
    }
    $error = true;
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

    <title>Login</title>
    <link rel="shortcut icon" href="../assets/img/favicon.png">
  </head>
  <body>

  <?php if(isset($error) ) : 
    echo "<script>alert('Email/Password salah!')</script>";
    ?>
<?php endif; ?>

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
        <a class="navbar-brand ; text-light" href="#">Login</a>
        <a class="btn btn-outline-dark my-2 my-sm-0 text-light"  href="register.php">Register</a>
    
  </form>
    
  </div>
</nav>

<!--START CONTENT-->
<section class="container mt-4">
    <div class="row justify-content-center">
        <div class="row justify-content-center mt-3 ">
            <div class="col-sm ">
                <div class="card p-5" style="width: 25rem;">
                    <h3 class="text-center mb-3">
                        Login
                    </h3>
                    <ul class="list-group list-group-flush">
                        <form method="POST" action="">
                            <div class="form-group mt-3">
                                <label class="text-info">E-mail</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label class="text-info">Kata Sandi</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="login" class="btn btn-info justify-content-center mb-2">Login</button>
                                <p class="text-info">Anda belum memiliki Akun? 
                                    <a href="register.php">Registrasi</a>
                                </p>
                            </div>
                        </form>
                    </ul>
                    </div>
            </div>
        </div> 
    </div>
</section>
<!--END CONTENT-->
</body>
</html>