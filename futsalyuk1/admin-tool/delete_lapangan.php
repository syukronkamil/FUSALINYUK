<?php
include '../config/connection.php';

$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM lapangan WHERE id = $id");

echo '<script>alert("Berhasil dihapus"); location.href = "daftarlapangan.php"</script>';
?>