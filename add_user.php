<?php
include_once 'koneksi.php';
if(isset($_POST['add_user']))
{
    $namalengkap=$_POST['name'];
    $role=$_POST['role'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $telp=$_POST['telp'];
    $address=$_POST['alamat'];
    
    // Insert and Upload Image 
    $avatar=$_FILES['foto']['name'];
    $imageUpload =$_FILES['foto']['tmp_name'];
    $dirUpload = 'upload/';
    $upload = move_uploaded_file($imageUpload,$dirUpload . $avatar);

    $sql = " INSERT into users (email,name,role,avatar,phone,address,password) 
            values ('$email','$namalengkap','$role','$avatar','$telp','$address','$password')";

    if($conn->query($sql) === TRUE){
        echo "<script type='text/javascript'> alert ('Success')</script>";
        header ("location:users.php");
    } else {
        echo "<script type='text/javascript'> alert ('Error') </sciprt>";   
    }
}
?>