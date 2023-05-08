<?php
$conn = mysqli_connect('localhost','root','','arkatama_store')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Arkatama Store</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/icon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
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
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <h1>Arkatama Store<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#categories">Categories</a></li>
          <li><a href="products.php"> All Products</a></li>
        </ul>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Welcome To<br>Arkatama Store</h2>
          <p data-aos="fade-up" data-aos-delay="100">Apa yang kamu cari ada disini!!</p>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/img/store.jpg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->
  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="categories" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="span9">
            <br>
          <form class="form-horizontal row-fluid" action="index.php" method="post">
            <div class="control-group">
                <label class="control-label" for="Search"><b>Search:</b></label>
                <div class="controls">
                  <input type="text" id="name" name="name" placeholder="Enter Name/ID of Book" class="span8" required>
                  <button type="submit" name="submit"class="btn btn-primary px-4 ms-4">Search</button>
                </div>
            </div>
          </form>
            <br>
            <?php
            if(isset($_POST['submit']))
                {
                  $s=$_POST['name'];
                  $sql="select * from categories where id='$s' or name like '%$s%'";
                }
            else
                $sql="select * from categories";
                $result=$conn->query($sql);
                $rowcount=mysqli_num_rows($result);
            if(!($rowcount))
                echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
            else
            {
            ?>
            <table class="table" id = "tables">
              <thead style="background-color: #FF6D60;">
                <tr style="text-align: center;">
                <th scope="col" class="pb-4">Id</th>
                <th scope="col" class="pb-4">Name</th>
                <th scope="col" class="pb-4">Created At</th>
                <th scope="col" class="pb-4">Update At</th>
                </tr>
              </thead>
                <tbody>
                <?php
                  while($row=$result->fetch_assoc())
                  {
                    $id=$row['id'];
                    $name=$row['name'];
                    $create=$row['created_at'];     
                    $update=$row['updated_at'];     
                ?>
                  <tr style="text-align: center;">
                    <td><?php echo $id?></td>
                    <td><?php echo $name?></td>
                    <td><?php echo $create?></td>
                    <td><?php echo $update?></td>
                  </tr>
                  <?php 
                  }
            } 
            ?>
                </tbody>
            </table>
            </div>
          </div>
          <br>
          <form class="form-horizontal row-fluid" action="" method="post">
            <div class="control-group">
                <div class="mb-3">
                    <label class="form-label" for="Name"><b>Nama Categories</b></label>
                    <div class="controls">
                        <input type="text" name="name"  class="form-control form Button-Up" required>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="controls mt-3">
                        <button type="submit" name="submitt"class="btn btn-primary">Add Categories</button>
                    </div>
                </div>
            </div>
          </form>
          <?php
            if (isset($_POST['submitt'])){
              $name=$_POST['name'];
  
              $sql1=" INSERT into categories (name) 
                      values ('$name')";
              $result=$conn->query($sql1);
            }
          ?>
      </div>
    </section>
  </main>
  <!-- ======= Footer ======= -->
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