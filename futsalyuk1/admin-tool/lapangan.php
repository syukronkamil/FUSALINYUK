<?php  
include '../config/connection.php';

if(isset($_POST['submit'])){
	$nama 	= $_POST['nama'];
	$harga 	= $_POST['harga'];
	$alamat	= $_POST['alamat'];

	$allowedExtenstions = ['jpg', 'png'];
	$fileName = $_FILES['image']['name'];
	$x = explode('.', $fileName);
	$extension = strtolower(end($x));
	$fileTmp = $_FILES['image']['tmp_name'];

	if(!empty($fileName)){
		if(in_array($extension, $allowedExtenstions)){
			$upload = move_uploaded_file($fileTmp, '../assets/img/'.$fileName);

			if($upload){
				$insert = mysqli_query($conn, "
					INSERT INTO 
						lapangan 
						(nama, harga, image, alamat)
					VALUES
						(
							'$nama',
							'$harga',
							'$fileName',
							'$alamat'
						)
					");

				echo '<script>alert("Berhasil ditambahkan"); location.href = "daftarlapangan.php"</script>';
			}else{
				echo '<script>alert("File yang di-upload gagal")</script>';
			}
		}else{
			echo "<script>alert('Ekstensi file yang di-upload tidak diperbolehkan')</script>";
		}
	}else{
		$insert = mysqli_query($conn, "
			INSERT INTO 
				lapangan 
				(nama, harga, alamat)
			VALUES
				(
					'$nama',
					'$harga',
					'$alamat'
				)
			");

		echo '<script>alert("Berhasil ditambahkan"); location.href = "daftarlapangan.php"</script>';
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
          <li class="active">Daftar Lapangan</li>
      </ol>
   </div>
   <div class="col-md-10" style="width: 25cm; padding-left: 5cm;">
   <h3 class="text-center">Tambah Daftar Lapangan</h3>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Lapangan</label>
						<input type="text" class="form-control" name="nama">
					</div>
					<div class="form-group">
						<label>Harga Lapangan</label>
						<input type="number" class="form-control" name="harga">
					</div>
					<div class="form-group">
						<label>Foto Lapangan</label>
						<input type="file" class="form-control" name="image">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="alamat" rows="5" class="form-control"></textarea>
					</div>
					<button class="btn btn-primary" type="submit" name="submit">Submit</button>
				</form>
   </div>
   
   </div>
    
   <div class="col-md-12" style="background:#1682ba;padding:8px;color:#fff;"><center>Futsalin Yuk</a> &copy 2021</center></div>
</body>
<html>