<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "coba";

$conn = mysqli_connect("$servername", "$username", "$password", "$database");
if(!$conn){
    die ("Error Koneksi Database". mysqli_connect_error());
}
?>