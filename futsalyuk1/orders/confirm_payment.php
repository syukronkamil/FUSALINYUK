<?php
include "../Login/function.php";
$database = new database();
session_start();
if (!isset($_SESSION['is_login'])) {
    header('location:..Login/login.php');
}
$current = $_SESSION['email'];
$user_id = $_SESSION['user_id'];
$query = mysqli_query ($conn, "SELECT * FROM orders WHERE user_id=$user_id");


if (isset($_POST['submit'])) {
	$user_id = $_SESSION['user_id'];
	$no_pembayaran = $_POST['no_pembayaran'];
	$jumlah_pembayaran = $_POST['jumlah_pembayaran'];
    $tanggal = date('Y-m-d', strtotime($_POST['tanggal']));
    $nama_rekening = $_POST['nama_rekening'];
	$no_rekening = $_POST['no_rekening'];
	
	
	$insert = mysqli_query($conn, "
		INSERT INTO 
			confirm_payment
			(
				user_id,
				no_pembayaran,
                jumlah_pembayaran,
                tanggal,
                nama_rekening,
                no_rekening
			)
		VALUES
			(
				'$user_id',
                '$no_pembayaran',
                '$jumlah_pembayaran',
                '$tanggal',
                '$nama_rekening',
                '$no_rekening'
			)
		");

	if($insert){
		echo '<script>alert("Berhasil disubmit, cek status pembayaran di Status Booking"); location.href = "status_booking.php"</script>';
	}else{
		echo mysqli_error($conn);
	}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="shortcut icon" href="../assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: "Lato", sans-serif;
            }

            .sidenav {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: teal;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }

            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 20px;
                color: white;
                display: block;
                transition: 0.3s;
            }

            .sidenav a:hover {
                color: pink;
            }

            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }

            @media screen and (max-height: 450px) {
                .sidenav {
                    padding-top: 15px;
                }

                .sidenav a {
                    font-size: 18px;
                }
            }

            .file {
                visibility: hidden;
                position: absolute;
            }
        </style>

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
                    <a class="nav-link text-light" style="font-family: Arial; font-weight: bold;" href="profile.php">PROFILE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" style="font-family: Arial; font-weight: bold;" href="index.php">BOOKING LAPANGAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" style="font-family: Arial; font-weight: bold;" href="index1.php">CARI LAWAN TANDING</a>
                </li>
            </ul>
            <a class="nav-link text-light" style="font-family: Arial; font-weight: bold; padding-right:5px;" href="feedback.php">FEEDBACK | </a>
            <span class="navbar-text text-light" style="font-family: Arial; font-weight: bold;">Selamat Datang, </span>
            <a class="nav-item" style="color:teal;">.</a>
            <a class="nav-item text-light" style="font-family: Arial; font-weight: bold;"><?= $_SESSION["nama"] ?></a>
            <a class="nav-item" style="color:teal;">...</a>
            <a class="btn btn-danger my-2 my-sm-0 text-light" style="font-family: Arial; font-weight: bold;" href="../Login/logout.php">LOGOUT</a>

        </div>
    </nav>
   
        

        <div id="mySidenav" class="sidenav">
          <br><br>

            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="profile.php">Account Setting</a>
            <a href="status_booking.php">Status Booking</a>
            <a href="status_carilawan.php">Status Cari Lawan</a>
            <a href="confirm_payment.php">Konfirmasi Pembayaran</a>

        </div>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
   
   
    <div class="container" style="padding-left:0cm;">
       
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="container">
            <h5 class="text-left" style="color:cornflowerblue">Submit Confirmation</h5>
            <div class="row">
                <div class="col-sm-6">
            <div class="card" style="height:10cm;">
              <div class="card-header" style="background-color: teal;"></div>
              <div class="card-body">
			  <div class="form-group">
								<label>No.Pembayaran</label>
								<input type="text" class="form-control" name="no_pembayaran" required>
							</div>

							<div class="form-group">
								<label>Jumlah Pembayaran</label>
								<input type="text" class="form-control" name="jumlah_pembayaran" required>
							</div>

							<div class="form-group">
								<label>Tanggal</label>
								<input type="text" name="tanggal" class="form-control datepicker" autocomplete="off" required>
							</div>

							

                  <br>
             </div>
            </div>
                </div>
                <div class="col-sm-6">
            <div class="card" style="height:10cm;">
              <div class="card-header" style="background-color: teal;"></div>
              <div class="card-body">
			                <div class="form-group">
								<label>Nama Pemilik Rekening</label>
								<input type="text" class="form-control" name="nama_rekening" required>
							</div>

							<div class="form-group">
								<label>No. Rekening</label>
								<input type="text" class="form-control" name="no_rekening" required>
							</div>

                            <br>
							<button class="btn btn-success" type="submit" name="submit">Submit</button>
                 
               
                  
            </div>
            </div>
            </div>
          </div>
      </form>
      <script type="text/javascript">
   
   $('.datepicker').datepicker({ 
	   startDate: new Date()
   });
 
</script>
</body>

</html>
