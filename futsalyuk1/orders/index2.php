<?php  
session_start();
if (! isset($_SESSION['is_login'])) {
    header('location:login.php');
}

include '../config/connection.php';

$query = mysqli_query($conn, "SELECT * FROM orders WHERE carilawan='Ya'");
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

	
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
		

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
    <a class="btn btn-danger my-2 my-sm-0 text-light"  style="font-family: Arial; font-weight: bold;"   href="../Login/logout.php">LOGOUT</a>
    
  </div>
</nav>

		
 <?php  
include '../config/connection.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM orders WHERE id = $id");
$data = mysqli_fetch_assoc($data);

if (isset($_POST['submit'])) {
	$user_id = $_SESSION['user_id'];
	$nama_pemesan = $_POST['nama_pemesan'];
	$nama_tim = $_POST['nama_tim'];
	$nama_lapangan = $_POST['nama_lapangan'];
	$tanggal = date('Y-m-d', strtotime($_POST['tanggal']));
	$jam_mulai = date('H:i:s', strtotime($_POST['jam_mulai'] ));
	$jam_berakhir = date('H:i:s', strtotime($_POST['jam_berakhir'] ));
	$biaya = $_POST['biaya'];
	$nama_penantang = $_POST['nama_penantang'];
	$nama_tim_penantang = $_POST['nama_tim_penantang'];
	$no_penantang = $_POST['no_penantang'];
	$alamat_penantang = $_POST['alamat_penantang'];
	

	$insert = mysqli_query($conn, "
		INSERT INTO 
			penantang
			(
				user_id,
				nama_pemesan,
				nama_tim,
				nama_lapangan,
				tanggal,
				jam_mulai,
				jam_berakhir,
				biaya,
				nama_penantang,
				nama_tim_penantang,
				no_penantang,
				alamat_penantang
				
			)
		VALUES
			(
				'$user_id',
				'$nama_pemesan',
				'$nama_tim', 
				'$nama_lapangan', 
				'$tanggal',
				'$jam_mulai', 
				'$jam_berakhir', 
				'$biaya',
				'$nama_penantang', 
				'$nama_tim_penantang', 
				'$no_penantang', 
				'$alamat_penantang'
				
			)
		");

	if($insert){
		echo '<script>alert("Berhasil submit, cek status cari lawan pada Profile"); location.href = "index1.php"</script>';
	}else{
		echo mysqli_error($conn);
	}

}
?>



				
				<div class="container" style="padding-top: 0cm;">
  				<div class="d-flex justify-content-center">
				  
				<div class="card mt-5 mb-3" style="width:30cm;">
					<div class="card-body" style="background-color: azure;" >
						<div class="row">
							<div class="col-md-6">
							<h5 class="text-left" style="color:cornflowerblue">Data Pemesan</h5><br>
							<h2><?php echo $data['nama_tim'] ?></h2>
								<br>
								<p>
								<b>Nama Tim:</b> <?php echo $data['nama_tim'] ?>
									<br><br>
									Nama Pemesan: <?php echo $data['nama_pemesan'] ?>
                                    <br><br>
									Nama Lapangan: <?php echo $data['nama_lapangan'] ?>
									<a href="index.php"> | lihat daftar</a>
									<br><br>
									Alamat Lapangan: <?php echo $data['alamat_lapangan'] ?>
                                    <br><br>
								</p>
							</div>
							<div class="col-md-6">
								<br><br><br><br><br>
								<p>
								Tanggal: <?php echo $data['tanggal'] ?>
                                    <br><br>
									Jam Mulai: <?php echo $data['jam_mulai'] ?>
                                   <br><br>
									Jam Berakhir: <?php echo $data['jam_berakhir'] ?>
                                    <br><br>
									Biaya: <?php echo $data['biaya'] ?>
								</p>
							</div>
						</div>
						</div>
						</div>
					</div>
				</div>

				
				

	<form action="" method="POST" enctype="multipart/form-data">
        <div class="container">
            <h5 class="text-left" style="color:cornflowerblue">Data Penantang</h5>
            <div class="row">
                <div class="col-sm-6">
            <div class="card" style="height:15cm;">
              <div class="card-header" style="background-color: teal;"></div>
              <div class="card-body">
			  				<div class="form-group">
								<label>Nama Pemesan</label>
								<input type="text" class="form-control" name="nama_pemesan" value="<?php echo $data['nama_pemesan'] ?>" readonly required>
							</div>

							<div class="form-group">
								<label>Nama Tim Pemesan</label>
								<input type="text" class="form-control" name="nama_tim" value="<?php echo $data['nama_tim'] ?>" readonly required>
							</div>

							<div class="form-group">
								<label>Nama Lapangan</label>
								<input type="text" class="form-control" name="nama_lapangan" value="<?php echo $data['nama_lapangan'] ?>" readonly required>
							</div>

							<div class="form-group">
								<label>Tanggal</label>
								<input type="text" class="form-control" name="tanggal" value="<?php echo $data['tanggal'] ?>" readonly required>
							</div>

							<div class="form-group">
								<label>Jam Mulai</label>
								<input type="text" class="form-control" name="jam_mulai" value="<?php echo $data['jam_mulai'] ?>" readonly required>
							</div>

							<div class="form-group">
								<label>Jam Selesai</label>
								<input type="text" class="form-control" name="jam_berakhir" value="<?php echo $data['jam_berakhir'] ?>" readonly required>
							</div>
                  <br>
             </div>
            </div>
                </div>
                <div class="col-sm-6">
            <div class="card" style="height:15cm;">
              <div class="card-header" style="background-color: teal;"></div>
              <div class="card-body">
			  				<div class="form-group">
								<label>Biaya</label>
								<input type="text" class="form-control" name="biaya" value="<?php echo $data['biaya'] ?>" readonly required>
							</div>

							<div class="form-group">
								<label>Nama Penantang</label>
								<input type="text" class="form-control" name="nama_penantang" value="<?= $_SESSION["nama"] ?>" readonly required>
							</div>

							<div class="form-group">
								<label>Nama Tim Penantang</label>
								<input type="text" class="form-control" name="nama_tim_penantang" required>
							</div>

							<div class="form-group">
								<label>No.HP Penantang</label>
								<input type="text" class="form-control" name="no_penantang" value="<?= $_SESSION["no_hp"] ?>" readonly required>
							</div>

							<div class="form-group">
								<label>Alamat Penantang</label>
								<input type="text" class="form-control" name="alamat_penantang" required>
							</div>
							
							<br>

							<button class="btn btn-success" type="submit" name="submit">Submit</button>
                 
               
                  
            </div>
            </div>
            </div>
          </div>
      </form>

	
</body>
</html>