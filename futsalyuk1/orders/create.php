<?php  

session_start();
if (! isset($_SESSION['is_login'])) {
    header('location:../Login/login.php');
}

include '../config/connection.php';

$query = mysqli_query($conn, "SELECT * FROM lapangan");
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
    <a class="btn btn-danger my-2 my-sm-0 text-light"  style="font-family: Arial; font-weight: bold;"   href="../logout.php">LOGOUT</a>
    
  </div>
</nav>

		
 <?php  
include '../config/connection.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM lapangan WHERE id = $id");
$data = mysqli_fetch_assoc($data);

if (isset($_POST['submit'])) {
	$user_id = $_SESSION['user_id'];
	$nama_pemesan = $_POST['nama_pemesan'];
	$nama_tim = $_POST['nama_tim'];
	$nama_lapangan = $_POST['nama_lapangan'];
	$no_pemesan = $_POST['no_pemesan'];
	$alamat_lapangan = $_POST['alamat_lapangan'];
	$tanggal = date('Y-m-d', strtotime($_POST['tanggal']));
	$jam_mulai = date('H:i:s', strtotime($_POST['jam_mulai'] . ':00:00'));
	$jam_berakhir = date('H:i:s', strtotime($_POST['jam_berakhir'] . ':00:00'));
	$carilawan = $_POST['carilawan'];
	$biaya = $_POST['biaya'];

	$insert = mysqli_query($conn, "
		INSERT INTO 
			orders
			(
				user_id,
				nama_pemesan,
				nama_tim,
				nama_lapangan,
				no_pemesan,
				alamat_lapangan,
				tanggal,
				jam_mulai,
				jam_berakhir,
				carilawan,
				biaya
			)
		VALUES
			(
				'$user_id',
				'$nama_pemesan',
				'$nama_tim',
				'$nama_lapangan',
				'$no_pemesan',
				'$alamat_lapangan',
				'$tanggal',
				'$jam_mulai',
				'$jam_berakhir',
				'$carilawan',
				$biaya
			)
		");

	if($insert){
		echo '<script>alert("Berhasil submit, cek status booking pada Profile"); location.href = "index.php"</script>';
	}else{
		echo mysqli_error($conn);
	}

}
?>


				<div class="container" style="padding-top: 1cm;">
  				<div class="d-flex justify-content-center">
				<div class="card mt-5 mb-3" style="width:30cm;">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<img src="../assets/img/<?php echo $data['image'] ?>" style="width: 12cm;">
							</div>
							<div class="col-md-6">
								<h2><?php echo $data['nama'] ?></h2>
								<br>
								<p>
									<b>Alamat:</b> <?php echo $data['alamat'] ?>
									<br><br>
									<b>Harga:</b> Rp. <?php echo $data['harga'] ?>
								</p>
							</div>
						</div>
						</div>
						</div>
					</div>
				</div>

				
				

	<form action="" method="POST" enctype="multipart/form-data">
        <div class="container">
            <h5 class="text-left" style="color:cornflowerblue">Data Pemesan</h5>
            <div class="row">
                <div class="col-sm-6">
            <div class="card" style="height:14cm;">
              <div class="card-header" style="background-color: teal;"></div>
              <div class="card-body">
			  <div class="form-group">
								<label>Nama Pemesan</label>
								<input type="text" class="form-control" name="nama_pemesan" value="<?= $_SESSION["nama"] ?>" readonly required>
							</div>

							<div class="form-group">
								<label>Nama Tim</label>
								<input type="text" class="form-control" name="nama_tim" required>
							</div>

							<div class="form-group">
								<label>No.HP Pemesan</label>
								<input type="text" class="form-control" name="no_pemesan" value="<?= $_SESSION["no_hp"] ?>" readonly required>
							</div>

							<div class="form-group">
								<label>Nama Lapangan</label>
								<input type="text" class="form-control" name="nama_lapangan" value="<?php echo $data['nama'] ?>" readonly required>
							</div>

							<div class="form-group">
								<label>Alamat Lapangan</label>
								<textarea name="alamat_lapangan" rows="3" class="form-control" readonly required><?php echo $data['alamat'] ?></textarea>
							</div>
                  <br>
             </div>
            </div>
                </div>
                <div class="col-sm-6">
            <div class="card" style="height:14cm;">
              <div class="card-header" style="background-color: teal;"></div>
              <div class="card-body">
			  <div class="form-group">
								<label>Tanggal</label>
								<input type="text" name="tanggal" class="form-control datepicker" autocomplete="off" required>
							</div>

							<div class="form-group">
								<label>Jam Mulai</label>
								<select name="jam_mulai" class="form-control" id="jam_mulai" required>
									<option value="" disabled selected>-- PILIH JAM --</option>
									<option value="09">09:00</option>
									<option value="10">10:00</option>
									<option value="11">11:00</option>
									<option value="12">12:00</option>
									<option value="13">13:00</option>
									<option value="14">14:00</option>
									<option value="15">15:00</option>
									<option value="16">16:00</option>
									<option value="17">17:00</option>
									<option value="18">18:00</option>
									<option value="19">19:00</option>
									<option value="20">20:00</option>
									<option value="21">21:00</option>
									<option value="22">22:00</option>
								</select>
							</div>

							<div class="form-group">
								<label>Jam Berakhir</label>
								<select name="jam_berakhir" class="form-control" id="jam_berakhir" required>
									<option value="" disabled selected>-- PILIH JAM --</option>
									
									<option value="10">10:00</option>
									<option value="11">11:00</option>
									<option value="12">12:00</option>
									<option value="13">13:00</option>
									<option value="14">14:00</option>
									<option value="15">15:00</option>
									<option value="16">16:00</option>
									<option value="17">17:00</option>
									<option value="18">18:00</option>
									<option value="19">19:00</option>
									<option value="20">20:00</option>
									<option value="21">21:00</option>
									<option value="22">22:00</option>
									<option value="23">23:00</option>
								</select>
							</div>

							<div class="form-group">
								<label>Cari Lawan Tanding?</label>
								<select name="carilawan" class="form-control" id="carilawan" required>
									<option value="" disabled selected>-- PILIH OPSI --</option>
									
									<option value="Ya">Ya</option>
									<option value="Tidak">Tidak</option>
								</select>
							</div>

							<div class="form-group">
								<label>Biaya</label>
								<input type="text" class="form-control" name="biaya" readonly id="biaya" required>
							</div>

							
							

							<button class="btn btn-success" type="submit" name="submit">Submit</button>
                 
               
                  
            </div>
            </div>
            </div>
          </div>
      </form>

	
	<script>
		$('#jam_mulai, #jam_berakhir').on('change', function(){
			var jam_mulai = $('#jam_mulai').val();
			var jam_berakhir = $('#jam_berakhir').val();

			if(jam_mulai != null && jam_berakhir != null){
				if (jam_mulai > jam_berakhir) {
					alert('Jam mulai harus lebih awal dibandingkan jam selesai');
					$('#biaya').val('');
					return location.href = "create.php?id=<?php echo $data['id'] ?>";
				}
				if (jam_mulai == jam_berakhir) {
					alert('Jam mulai dan jam selesai tidak boleh sama');
					$('#biaya').val('');
					return location.href = "create.php?id=<?php echo $data['id'] ?>";
				}

				var biaya = (jam_berakhir - jam_mulai) * <?php echo $data['harga'] ?>;
				
				$('#biaya').val(biaya);
			}
		})
	</script>

<script type="text/javascript">
   
   $('.datepicker').datepicker({ 
	   startDate: new Date()
   });
 
</script>
</body>
</html>