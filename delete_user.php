<?php
include_once 'koneksi.php';
$delete=$_GET['id'];
$sql = "DELETE FROM users WHERE id='$delete'";

if (mysqli_query($conn, $sql)){
    header('Location:users.php');
} else {
    echo "<script type='text/javascript'>alert('Gagal Menghapus Data')</script>";
}
?>