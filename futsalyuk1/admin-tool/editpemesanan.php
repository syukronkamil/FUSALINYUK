<?php  
include '../config/connection.php';
	
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM orders WHERE id = $id");
$data = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])){
	$status = $_POST['status'];
	$no_penantang = $_POST['no_penantang'];
	$status_booking = $_POST['status_booking'];
	$no_pembayaran = $_POST['no_pembayaran'];
	$status_pembayaran = $_POST['status_pembayaran'];
	
	
		
				$insert = mysqli_query($conn, "
					UPDATE
						orders 
					SET
						status = '$status',
						no_penantang = '$no_penantang',
						status_booking = '$status_booking',
						no_pembayaran = '$no_pembayaran',
						status_pembayaran = '$status_pembayaran'
					WHERE
						id = $id
				");

				
	if($insert){
		echo '<script>alert("Berhasil diupdate"); location.href = "daftarpemesanan.php"</script>';
	}else{
		echo mysqli_error($conn);
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
   <title>Futsalin Yuk</title>
</head>
<body>

	
   <div class="col-md-2 colmenu" style="padding:0;">
      <div class="col-md-12" style="padding:10px;"><center><img src="../assets/img/profil.jpg" alt="" height="100px" width="100px"></center></div>
      <div class="col-md-12" style="padding:5px;padding-bottom:10px;color:#fff;"><center>Nama Admin</center></div>
      <div id='cssmenu'>
<ul>
   <li><a href='home.php'><i class="fa fa-home fa-fw"></i>&nbsp; Home</a></li>
   <li><a href='?user'><i class="fa fa-users fa-fw"></i>&nbsp; Admin</a></li>
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
          <li class="active">Edit Pemesanan</li>
      </ol>
   </div>
 
   <div class="col-md-10" style="width: 25cm; padding-left: 5cm;">
				<h3 class="text-center">Edit Pemesanan</h3>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Status Cari Lawan</label>
						<input type="text" class="form-control" name="status" value="<?php echo $data['status'] ?>">
					</div>
					<div class="form-group">
						<label>No.HP Penantang</label>
						<input type="text" class="form-control" name="no_penantang" value="<?php echo $data['no_penantang'] ?>">
					</div>
					<div class="form-group">
						<label>Status Booking</label>
						<input type="text" class="form-control" name="status_booking" value="<?php echo $data['status_booking'] ?>">
					</div>
					<div class="form-group">
						<label>No. Pembayaran</label>
						<input type="text" class="form-control" name="no_pembayaran" value="<?php echo $data['no_pembayaran'] ?>">
					</div>
					<div class="form-group">
						<label>Status Pembayaran</label>
						<input type="text" class="form-control" name="status_pembayaran" value="<?php echo $data['status_pembayaran'] ?>">
					</div>
					
					
					<button class="btn btn-primary" type="submit" name="submit">Submit</button>
				</form>
			</div>
   
   </div>
    
   <div class="col-md-12" style="background:#1682ba;padding:8px;color:#fff;"><center>Futsalin Yuk &copy 2021</center></div>
</body>
<html>