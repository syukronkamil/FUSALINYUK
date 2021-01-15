<?php  
session_start();
if (! isset($_SESSION['is_login'])) {
    header('location:../Login/login.php');
}
include_once('../Login/function1.php');
$database = new database();

if(isset($_POST['submit'])){
	$nama 	= $_POST['nama'];
	$email 	= $_POST['email'];
    $no_hp	= $_POST['no_hp'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    
    if ($_POST['konfirmasi_password'] == $_POST['password']) {
        if ($database->register_admin($nama,$email,$no_hp,$password)) {
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

<!doctype>
<html lang='ind'>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../assets/css/styles-menu-admin.css">
   <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

   <script src="../assets/js/jquery.min.js"></script>
   <script src="../assets/js/bootstrap.min.js"></script>
   <script src="../assets/js/script.js"></script>
   <title>Halaman Admin</title>
</head>
<body>

	
   <div class="col-md-2 colmenu" style="padding:0;">
      <div class="col-md-12" style="padding:10px;"><center><img src="../assets/img/profil.jpg" alt="" height="100px" width="100px"></center></div>
      <div class="col-md-12" style="padding:5px;padding-bottom:10px;color:#fff;"><center><?= $_SESSION["nama"] ?></center></div>
      <div id='cssmenu'>
<ul>
   <li><a href='home.php'><i class="fa fa-home fa-fw"></i>&nbsp; Home</a></li>
   <li><a href='admin.php'><i class="fa fa-users fa-fw"></i>&nbsp; Admin</a></li>
   <li class='active has-sub'><a href='#'><i class="fa fa-bars fa-fw"></i>&nbsp; Kategori</a>
      <ul>
         <li><a href='daftarlapangan.php'><span>Daftar Lapangan</span></a>
         </li>
		 <li><a href='daftarpemesanan.php'><span>Daftar Pemesanan</span></a>
           
		   </li>
		   <li><a href='daftarpenantang.php'><span>Daftar Penantang</span></a>
			 
		   </li>
           <li><a href='daftarpembayaran.php'><span>Daftar Pembayaran</span></a>
           
         </li>
      </ul>
   </li>
   <li><a href='daftar_feedback.php'><i class="fa fa-archive fa-fw"></i>&nbsp; Feedback</a></li>
  
</div>
 
   </div>
 

 
    <div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
      <li> <a class="btn btn-danger my-2 my-sm-0 text-light"  style="font-family: Arial; font-weight: bold;"   href="../Login/logout.php">LOGOUT</a> </li>
          <li class="active">Daftar Admin</li>
      </ol>
   </div>
   <div class="col-md-10" style="width: 25cm; padding-left: 5cm;">
   <h3 class="text-center">Tambah Daftar Admin</h3>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Admin</label>
						<input type="text" class="form-control" name="nama">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email">
					</div>
					<div class="form-group">
						<label>No. Handphone</label>
						<input type="text" class="form-control" name="no_hp">
					</div>
					<div class="form-group">
						<label>Kata Sandi </label>
						<input type="password" class="form-control" name="password">
					</div>
                    <div class="form-group">
						<label>Kata Sandi </label>
						<input type="password" class="form-control" name="konfirmasi_password">
					</div>
					<button class="btn btn-primary" type="submit" name="submit">Submit</button>
				</form>
   </div>
   
   </div>
    
   <div class="col-md-12" style="background:#1682ba;padding:8px;color:#fff;"><center>Futsalin Yuk</a> &copy 2021</center></div>
</body>
<html>