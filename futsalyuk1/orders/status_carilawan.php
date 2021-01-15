<?php
include "../Login/function.php";
$database = new database();
session_start();
if (!isset($_SESSION['is_login'])) {
    header('location:..Login/login.php');
}
$current = $_SESSION['email'];
$user_id = $_SESSION['user_id'];
$query = mysqli_query ($conn, "SELECT * FROM penantang WHERE user_id=$user_id");




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
            </ul><a class="nav-link text-light" style="font-family: Arial; font-weight: bold; padding-right:5px;" href="feedback.php">FEEDBACK | </a>
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
   
    <!-- edit profile  -->
    <div class="container" style="padding-left:0cm;">
       
        <h3 class="text-center">History</h3>

        <h5 class="text-left">History Cari Lawan</h5>
        <p class="text-right">Jika status masih kosong, silahkan refresh</p>
<table class="table table-bordered mt-3" >
    <thead class="thead-dark">
        <tr>
            <th width="5%">#</th>
            <th>Nama Penantang</th>
            <th>Nama Tim Penantang</th>
            <th>Nama Pemesan</th>
            <th>Nama Tim Pemesan</th>
            <th>Nama Lapangan</th>
            <th>Tanggal</th>
            <th>Jam Mulai</th>
            <th>Jam Berakhir</th>
            <th>Biaya</th>
            <th>Status Apply</th>
            <th>No.HP Pemesan</th>

        </tr>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        <?php while ($data = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $no + 1; ?></td>
                <td><?php echo $data['nama_penantang'] ?></td>
                <td><?php echo $data['nama_tim_penantang'] ?></td>
                <td><?php echo $data['nama_pemesan'] ?></td>
                <td><?php echo $data['nama_tim'] ?></td>
                <td><?php echo $data['nama_lapangan'] ?></td>
                <td><?php echo $data['tanggal'] ?></td>
                <td><?php echo $data['jam_mulai'] ?></td>
                <td><?php echo $data['jam_berakhir'] ?></td>
                <td><?php echo $data['biaya'] ?></td>
                <td><?php echo $data['status_apply'] ?></td>
                <td><?php echo $data['no_pemesan'] ?></td>
         
                
                

                <?php $no++; ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
<p class="text-left" style="color:red;">
Jika Status Apply = Accept , silahkan melanjutkan untuk menghubungi pemesan dengan no.HP yg ada diatas  <br>
Jika Status Booking = Reject , artinya sudah diapply tim lain, silahkan melakukan apply dengan jam/tanggal/tim yg berbeda <br>
                </div>
            </div>
       
</body>

</html>
