<?php
include "../Login/function.php";
$database = new database();
session_start();
if (!isset($_SESSION['is_login'])) {
    header('location:login.php');
}
$current = $_SESSION['email'];
$sql = "SELECT * FROM user WHERE email = '$current'";
$items = mysqli_query($conn, $sql);
$data = $items->fetch_array();

if (isset($_POST['save'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    // $img = $_POST['gambar'];
    $user_id = $_SESSION['user_id'];

    $gambar = $_FILES['gambar']['name'];
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];

    if ($ukuran < 1044070) {
        move_uploaded_file($file_tmp, '../assets/img/' . $gambar);

        if ($_POST['password'] != "" && $_FILES['gambar'] != "") {
            $password = $_POST['password'];
            if ($_POST['password_check'] == $_POST['password']) {
                $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $update = mysqli_query($conn, "UPDATE user SET nama='$nama', no_hp='$no_hp', password='$password_hash', img='$gambar' WHERE id = '$user_id'");
                if ($update) {
                    header('Refresh:2');
                    echo '<div class="alert alert-success" role="alert">';
                    echo 'Berhasil di update!';
                    echo '</div>';
                }
            } else {
                header('Refresh:2');
                echo '<div class="alert alert-danger" role="alert">';
                echo 'Gagal di update!';
                echo '</div>';
            }
        } elseif ($gambar != "") {
            $update = mysqli_query($conn, "UPDATE user SET nama='$nama', no_hp='$no_hp', img='$gambar' WHERE id = '$user_id'");
            if ($update) {
                header('Refresh:2');
                echo '<div class="alert alert-danger" role="alert">';
                echo 'Berhasil di update!';
                echo '</div>';
            }
        } else {
            $update = mysqli_query($conn, "UPDATE user SET nama='$nama', no_hp='$no_hp' WHERE id = '$user_id'");
            if ($update) {
                header('Refresh:2');
                echo '<div class="alert alert-danger" role="alert">';
                echo 'Berhasil di update!';
                echo '</div>';
            }
        }
    } else {
        echo 'UKURAN FILE TERLALU BESAR';
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>


    <nav class="navbar navbar-expand-sm" style="background-color: teal;">
        <a class="navbar-brand" href="index.php"><img src="../assets/img/logo.png" height="60px" width="150px"></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" style="font-family: Arial; font-weight: bold;" href="../home.php">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" style="font-family: Arial; font-weight: bold;" href="profile.php">PROFILE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" style="font-family: Arial; font-weight: bold;" href="../orders/index.php">BOOKING LAPANGAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" style="font-family: Arial; font-weight: bold;" href="../orders/index1.php">CARI LAWAN TANDING</a>
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
    <!DOCTYPE html>
    <html>

    <head>
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
    </body>
    <!-- edit profile  -->
    <div class="row">
        <div class="col-sm-6" style="padding-left: 2.5cm;">
            <div class="card" style="height:12cm;">
                <div class="card-body" style="padding-bottom: 1cm; padding-top: 1cm;  width: 55rem;">
                    <!-- <div class="container" style="padding-bottom: 1cm; padding-top: 1cm;"> -->
                    <h2>Account Settings</h2>
                    <p> View and update your account details, profile and more</p>
                    <!-- <div class="row  justify-content-center">
            <div class="card" style="width: 60rem;">
                <div class="card-body"> -->
                    <form method="POST" action="profile.php" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-5">
                                <input type="text" disabled readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $data['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" name="nama" class="form-control" id="inputPassword" placeholder="nama" value="<?php echo $data['nama']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nomer Handphone</label>
                            <div class="col-sm-5">
                                <input type="number" name="no_hp" class="form-control" id="phone " required value="<?php echo $data['no_hp']; ?>">
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-5">
                                <input type="password" name="password" class="form-control" id="inputPassword">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password Confirm</label>
                            <div class="col-sm-5">
                                <input type="password" name="password_check" class="form-control" id="inputPassword">
                            </div>
                        </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6" style="padding-right: 3cm;">
            <div class="card">
                <div class="card-body" style="height:12cm;">
                    <img src="../assets/img/<?php echo $data['img']; ?>" height="250px" width="250px" id="preview" class="img-thumbnail">
                    <br><br>
                   
                    <div class="form-group">
                        <div id="msg"></div>
                        <input type="file" name="gambar" class="file">
                        <div class="input-group my-3">
                            <div class="input-group-append">
                                <input type="file" name="gambar">
                                
                            </div>
                        </div>

                       

                        
                    </div>
                    <br>
                    <div class="form-group row text-right" style="padding-left:1rem;">
                        <button type="submit" class="btn btn-primary mr-3" name="save" value="login">Submit</button>
                        <a href="../home.php" class="btn btn-primary mr-3" name="cancel" value="login">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).on("click", "#pilih_gambar", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });

    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>