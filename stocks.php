<?php
$conn = mysqli_connect('localhost','root','','arkatama_store');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Arkatama Products</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/icon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <h1>Arkatama Store<span>.</span></h1>
        </a>
        <nav id="navbar" class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php"> All Products</a></li>
            <li><a href="#stocks"> Stok Product</a></li>
        </ul>
        </nav><!-- .navbar -->
    </div>
    </header><!-- End Header -->
    <main id="main">
    <!-- ======= About Section ======= -->
    <section id="stocks" class="about">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="span9">
            <br>
            <?php
                $sq1 = "SELECT products.name, products.id, products.category_id, products.description, products.price, products.status,
                        products.created_at, products.updated_at, products.created_by, products.verified_at, products.verified_by 
                        FROM products
                        JOIN categories ON products.category_id = categories.id
                        LIMIT 30;";
                $result=$conn->query($sq1);
            ?>
            <table class="table" id = "tables">
            <thead style="background-color: #FF6D60;">
                <tr style="text-align: center;">
                <th scope="col" class="pb-4">Id</th>
                <th scope="col" class="pb-4">Category_Id</th>
                <th scope="col" class="pb-4">Name</th>
                <th scope="col" class="pb-4">Description</th>
                <th scope="col" class="pb-4">Price</th>
                <th scope="col" class="pb-4">Status</th>
                <th scope="col" class="pb-4">Create At</th>
                <th scope="col" class="pb-4">Update At</th>
                <th scope="col" class="pb-4">Created By</th>
                <th scope="col" class="pb-4">Verified At</th>
                <th scope="col" class="pb-4">Verified By</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row=$result->fetch_assoc())
                {
                    $id=$row['id'];
                    $idcategori=$row['category_id'];
                    $name=$row['name'];
                    $description=$row['description'];
                    $price=$row['price'];
                    $status=$row['status'];
                    $create=$row['created_at'];     
                    $update=$row['updated_at'];     
                    $createby=$row['created_by'];     
                    $verifiedat=$row['verified_at'];     
                    $verifiedby=$row['verified_by'];     
                ?>
                <tr style="text-align: center;">
                    <td><?php echo $id?></td>
                    <td><?php echo $idcategori?></td>
                    <td><?php echo $name?></td>
                    <td><?php echo $description?></td>
                    <td><?php echo $price?></td>
                    <td><?php echo $status?></td>
                    <td><?php echo $create?></td>
                    <td><?php echo $update?></td>
                    <td><?php echo $createby?></td>
                    <td><?php echo $verifiedat?></td>
                    <td><?php echo $verifiedby?></td>
                </tr>
                <?php 
                }
            ?>
            </tbody>
            </table>
            </div>
        </div>
        </div>
    </section>
    </main><!-- End #main -->
    <footer id="footer" class="footer">
    <div class="container">
        <div class="copyright">
        &copy; Copyright <strong><span>Kelvin Aulia Wilson</span></strong>. All Rights Reserved
        </div>
        <h4>Follow Us</h4>
        <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
    </footer><!-- End Footer -->
    <!-- End Footer -->
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>