<?php
include '../config/connection.php';

$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM user WHERE id = $id");

echo '<script>alert("Berhasil dihapus"); location.href = "admin.php"</script>';
?>