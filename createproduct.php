<?php
$conn = mysqli_connect('localhost','root','','arkatama_store');
if (isset($_POST['add']))
{   
    $catID=$_POST['catID'];
    $nameproducts=$_POST['name'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $status=$_POST['status'];

    $sql="INSERT into products (category_id, name, description, price, status) 
            values ('$catID','$nameproducts','$description','$price','$status')";

    if($conn->query($sql) === TRUE){
        echo "<script type='text/javascript'>alert('Success')</script>";
        header('location:products.php');
    }
    else {
        echo "<script type='text/javascript'>alert('Error')</script>";
    }
}
?>