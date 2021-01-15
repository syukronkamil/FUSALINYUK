<?php
include ('../Login/function.php');
$database = new database();
session_start();
if (! isset($_SESSION['is_login'])) {
    header('location:../futsalyuk1/Login/login.php');
}


if (isset($_POST['submit'])) {
	
    $komentar = $_POST['komentar'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
	
	$insert = mysqli_query($conn, "
		INSERT INTO 
			feedback
			(
				
                komentar,
                nama,
                email
			)
		VALUES
			(
				
                '$komentar',
                '$nama',
                '$email'
			)
		");

	if($insert){
		echo '<script>alert("Feedback berhasil dikirim, terimakasih telah memberikan Feedback"); location.href = "feedback.php"</script>';
	}else{
		echo mysqli_error($conn);
	}

}
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/favicon.png">
    <title>Futsalin Yuk</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
    <body>

    <nav class="navbar navbar-expand-sm" style="background-color: teal;">
            <a class="navbar-brand"><img src="../assets/img/logo.png" height="60px" width="150px"></a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      <a class="nav-link text-light" style="font-family: Arial; font-weight: bold;" href="../home.php">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light"  style="font-family: Arial; font-weight: bold;"  href="profile.php">PROFILE</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link text-light"  style="font-family: Arial; font-weight: bold;"  href="index.php">BOOKING LAPANGAN</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link text-light"  style="font-family: Arial; font-weight: bold;"  href="index1.php">CARI LAWAN TANDING</a>
                    </li>
    </ul>
    <a class="nav-link text-light" style="font-family: Arial; font-weight: bold; padding-right:5px;" href="feedback.php">FEEDBACK | </a>
    <span class="navbar-text text-light"  style="font-family: Arial; font-weight: bold;" >Selamat Datang, </span>
    <a class="nav-item" style="color:teal;">.</a>
    <a class="nav-item text-light"  style="font-family: Arial; font-weight: bold;" ><?= $_SESSION["nama"] ?></a>
    <a class="nav-item" style="color:teal;">...</a>
    <a class="btn btn-danger my-2 my-sm-0 text-light"  style="font-family: Arial; font-weight: bold;" href="../Login/logout.php">LOGOUT</a>
    
  </div>
</nav>

<div class="container">
<div class="row " style="margin-top: 50px;">
<div class="col-md-12 col-md-offset-3 form-container"> 

<h2>Feedback</h2>
<br>

<form role="form" method="post" id="reused_form">
    
    
    <div class="row">
        <div class="col-sm-12 form-group">
            <label for="komen">Komentar:</label>
            <textarea class="form-control" type="textarea" name="komentar" id="komentar" placeholder="Komentar Anda" maxlength="6000" rows="4" required></textarea>
        </div>
        </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name" name="nama" value="<?= $_SESSION["nama"] ?>" readonly required>
        </div>
    <div class="col-sm-6 form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION["email"] ?>" readonly required>
    </div>
</div>

    <div class="row">
        <div class="col-sm-2 form-group">
            <button type="submit" name="submit" class="btn btn-lg btn-info btn-block" >Kirim </button>
        </div>
    </div>

        </form>
        
    </div>
</div>


</body>
</html>