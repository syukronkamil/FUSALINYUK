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

    function register_admin($nama, $email, $no_hp, $password){
        $insert = mysqli_query($this->koneksi,"INSERT INTO user VALUES ('','$nama','$email','$no_hp','$password','admin','')");
        return $insert;
    }
}
    ?>