<?php  
session_start();
if (! isset($_SESSION['is_login'])) {
    header('location:../Login/login.php');
}

include '../config/connection.php';

$query = mysqli_query($conn, "SELECT * FROM penantang");
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
   <li><a href='user.php'><i class="fa fa-users fa-fw"></i>&nbsp; User</a></li>
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
          <li class="active">Daftar Penantang</li>
      </ol>
   </div>
   <div class="col-md-10" style="margin-top: 0px;">
				
					<br>
					<table class="table table-bordered mt-3">
						<thead class="thead-dark">
							<tr>
								<th width="5%">NO</th>
								<th>Nama Penantang</th>
								<th>Nama Tim Penantang</th>
                        <th>No.HP Penantang</th>
                        <th>Nama Pemesan</th>
                        <th>Nama Tim Pemesan</th>
								<th>Nama Lapangan</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Status Apply</th>
                        <th>No.HP Pemesan</th>
								<th width="13%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 0 ?>
							<?php while($data = mysqli_fetch_array($query)){ ?>
								<tr>
									<td><?php echo $no + 1; ?></td>
									<td><?php echo $data['nama_penantang'] ?></td>
									<td><?php echo $data['nama_tim_penantang'] ?></td>
                           <td><?php echo $data['no_penantang'] ?></td>
                           <td><?php echo $data['nama_pemesan'] ?></td>
                           <td><?php echo $data['nama_tim'] ?></td>
                           <td><?php echo $data['nama_lapangan'] ?></td>
                           <td><?php echo $data['tanggal'] ?></td>
                           <td><?php echo $data['jam_mulai'] ?></td>
                           <td><?php echo $data['status_apply'] ?></td>
                           <td><?php echo $data['no_pemesan'] ?></td>
                                
									<td>
										<a href="editpenantang.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Edit</a>
										
									</td>

									<?php $no++; ?>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				
			</div>
   
   </div>
    
   <div class="col-md-12" style="background:#1682ba;padding:8px;color:#fff;"><center>Futsalin Yuk</a> &copy 2021</center></div>
</body>
<html>