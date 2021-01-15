<?php  

session_start();
if (! isset($_SESSION['is_login'])) {
    header('location:../Login/login.php');

}

include("../config/connection.php");

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

</head>

<body>
        <nav class="navbar navbar-expand-sm" style="background-color: teal;">
            <a class="navbar-brand" ><img src="../assets/img/logo.png" height="60px" width="150px"></a>

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

			<div class="col-md-12" style="margin-top: 50px;">
				
					<h4 class="text-center">DAFTAR LAPANGAN</h4>

					<div class="row mt-3">
						<?php while($data = mysqli_fetch_array($query)){ ?>
							<div class="col-md-4" style="padding-top:1cm;">
								<div class="card">
									<img src="../assets/img/<?php echo $data['image'] ?>" class="card-img-top" style="height: 6cm;">
									<div class="card-body">
										<h5 class="card-title"><?php echo $data['nama'] ?></h5>
										<p class="card-text">
											<b>Harga:</b> Rp. <?php echo $data['harga'] ?>
											<br>
											<b>Alamat:</b> <?php echo $data['alamat'] ?>
										</p>
										<a href="create.php?id=<?php echo $data['id'] ?>" class="btn btn-success">Booking Now</a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				
			</div>
		</div>
	</div>

	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>