<?php
include_once 'koneksi.php';
$detail=$_GET['id'];
$sql = "SELECT * FROM users where id='$detail'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

    $id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    $phone=$row['phone'];
    $role=$row['role'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/icon.png" rel="icon" type="image/x-icon">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
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
            <li><a href="users.php">Users</a></li>
            <li><a href="#details">Details</a></li>
        </ul>
        </nav>
    </div>
    </header>
    <main id="main">
        <section id="details" class="about">
            <div class="container" data-aos="fade-up">
                <br> 
                <h5><b>Detail User</b></h5>
                <br>
                <div class="row d-flex justify-content-center h-100">
                <div class="col col-md-9 col-lg-7 col-xl-5">
                    <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                        <div class="d-flex text-black">
                        <div class="flex-shrink-0 img-fluid" style="width: 180px; border: radius 10px;">
                            <?php
                                $sqlimage = "SELECT avatar FROM users where id='$detail'";
                                $resultimage = mysqli_query($conn, $sqlimage);
                                if($resultimage){
                                    $row = mysqli_fetch_assoc($resultimage);
                                    $imageData = $row['avatar'];
                            ?>
                                <!-- Display Image -->
                                <img src="upload/<?php echo $imageData;?>" alt="" width="180px" height="200px">
                                <?php 
                                } 
                                ?>
                            
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1"><?php echo "<b>Nama :</b>".$name; ?></h5>
                            <p class="mb-2 pb-1" style="color: #2b2a2a;"><?php echo $role; ?></p>
                            <h5 class="mb-1"><?php echo "<b>Email :</b>".$email; ?></h5>
                            <h5 class="mb-1"><?php echo "<b>No.Tlp :</b>".$phone; ?></h5>
                            <div class="d-flex pt-1">
                                <a href="edit_user.php?id=<?php echo $id; ?>" class="btn btn-primary flex-grow-1">Edit</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End Content -->
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
    </footer>
    <!-- End Content ===== -->
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