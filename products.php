<?php
include_once "koneksi.php";
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
            <li><a href="#products"> All Products</a></li>
            <li><a href="stocks.php"> Stok Product</a></li>
        </ul>
        </nav>
    </div>
    </header>
    <main id="main">
    <!-- ======= Products Section ======= -->
    <section id="products" class="about">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="span9">
            <br>
            <?php
                $sq1 = "SELECT products.name, products.id, products.category_id, products.description, products.price, products.status,
                        products.created_at, products.updated_at, products.created_by, products.verified_at, products.verified_by 
                        FROM products
                        JOIN categories ON products.category_id = categories.id
                        ;";
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
        <br> 
        <h5><b>Add Products</b></h5>
        <br>
        <form class="form-horizontal row-fluid" action="createproduct.php" method="post">
            <div class="control-group">
                <div class="mb-3">
                    <label class="form-label" for="Categories"><b>Pilih Kategori</b></label>
                    <select class="form-select" aria-label="Default select example" name="catID" required="">
                        <option disabled="" selected=""> Select Categori</option>
                            <option value="1">Shoes</option>
                            <option value="2">Meja</option>
                            <option value="3">Mobil</option>
                            <option value="4">Jam tangan</option>
                            <option value="5">Mouse</option>
                            <option value="6">Motorcycle</option>
                            <option value="7">Arsitektur</option>
                            <option value="8">School</option>
                            <option value="9">Furniture</option>
                            <option value="10">Technoloy</option>
                        </select>
                        <br>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name"><b>Name Products</b></label>
                    <div class="controls">
                        <input type="text" name="name"  class="form-control form Button-Up" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description"><b>Description</b></label>
                    <div class="controls">
                        <input type="text" name="description"  class="form-control form Button-Up" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="price"><b>Price</b></label>
                    <div class="controls">
                        <input type="number" name="price"  class="form-control form Button-Up" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="Status"><b>Status</b></label>
                    <select class="form-select" aria-label="Default select example" name="status" required="">
                        <option disabled="" selected=""> Select Status</option>
                        <option value="acepted">accepted</option>
                        <option value="waiting">waiting</option>
                        <option value="rejected">rejected</option>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="controls mt-3">
                        <button type="submit" name="add" class="btn btn-primary">Add Products</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </section>
    </main>
    <!-- ====== Footer===== -->
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
    <!-- ===== End Content ===== -->
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