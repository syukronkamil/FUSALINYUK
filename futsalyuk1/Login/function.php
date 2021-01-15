<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "futsal";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Koneksi Gagal! ');

class database{
    var $host = "localhost";
    var $user = "root";
    var $pass = "";
    var $name = "futsal";
    var $koneksi;

    function __construct(){
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->name);
    }

    function register($nama, $email, $no_hp, $password){
        $insert = mysqli_query($this->koneksi,"INSERT INTO user VALUES ('','$nama','$email','$no_hp','$password','member','')");
        return $insert;
    }

    function login($email, $password, $remember){
        $query = mysqli_query($this->koneksi, "SELECT * FROM user WHERE email='$email'");
        $data_user = $query->fetch_array();
            if ($remember) {
                setcookie('email', $email, time() + (60*60*24*5), '/');
                setcookie('nama', $data_user['nama'], time() + (60*60*24*5), '/');
                
            }
            if (password_verify($password,$data_user['password'])) {
                if ($data_user['type_user'] == 'admin') {
                    header('location:../admin-tool/home.php');
                } else if ($data_user['type_user'] == 'member') {
                    header('location:../home.php');
                }
            setcookie('warna_navbar', 'putih', time() + (60*60*24*5), '/');
            $_SESSION['user_id'] = $data_user['id'];
            $_SESSION['email'] = $email;
            $_SESSION['no_hp'] = $data_user['no_hp'];
            $_SESSION['nama'] = $data_user['nama'];
            $_SESSION['type_user'] = $data_user['type_user'];
            $_SESSION['is_login'] = TRUE;
            
            }
    }

    function relogin($email){
        $query = mysqli_query($this->koneksi, "SELECT * FROM user WHERE email='$email'");
        $data_user = $query->fetch_array();
        $_SESSION['email'] = $email;
        $_SESSION['nama'] = $data_user['nama'];
        $_SESSION['is_login'] = TRUE;
    }
}
?>