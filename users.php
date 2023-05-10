<?php 
include_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
            <li><a href="#users">Users</a></li>
            <li><a href="#addusers">Add Users</a></li>
        </ul>
        </nav>
    </div>
    </header>
    <main id="main">
    <!-- ======= Users Section ======= -->
    <section id="users" class="about">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="span9">
            <br>
            <?php
                $sql = "SELECT * FROM users;";
                $result=$conn->query($sql);
            ?>
            <table class="table" id = "tables">
            <thead style="background-color: #FF6D60;">
                <tr style="text-align: center;">
                <th scope="col" class="pb-4">Id</th>
                <th scope="col" class="pb-4">Avatar</th>
                <th scope="col" class="pb-4">Name</th>
                <th scope="col" class="pb-4">Email</th>
                <th scope="col" class="pb-4">Phone</th>
                <th scope="col" class="pb-4">Role</th>
                <th scope="col" class="pb-4">Menu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row=$result->fetch_assoc())
                {
                    $id=$row['id'];
                    $avatar=$row['avatar'];
                    $name=$row['name'];
                    $email=$row['email'];
                    $phone=$row['phone'];
                    $role=$row['role'];

                ?>
                <tr style="text-align: center;">
                    <td><?php echo $id?></td>
                    <td><?php echo $avatar?></td>
                    <td><?php echo $name?></td>
                    <td><?php echo $email?></td>
                    <td><?php echo $phone?></td>
                    <td><?php echo $role?></td>
                    <td><center>
                        <a href="details_user.php?id=<?php echo $id; ?>" class="btn btn-primary">Details</a>
                        <a href="edit_user.php?id=<?php echo $id; ?>" class="btn btn-success">Edit</a>
                        <a href="delete_user.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                        </center>
                    </td>
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
    <!-- ====== Add Users Section -->
    <section id="addusers" class="about">
    <div class="container" data-aos="fade-up">
        <br> 
        <h5><b>Add Users</b></h5>
        <br>
        <form class="form-horizontal row-fluid" action="add_user.php" method="post" enctype="multipart/form-data">
            <div class="control-group">
                <div class="mb-3">
                    <label class="form-label"><b>Nama</b></label>
                    <div class="controls">
                        <input type="text" name="name" class="form-control form Button-Up" placeholder="Nama Lengkap" required >
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label"><b>Role</b></label>
                        <select class="form-select" aria-label="Default select example" name="role" required="">
                            <option disabled="" selected="">Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                        </select>
                        <br>
                    </div>
                    <div class="col-6">
                        <label class="form-label"><b>Password</b></label>
                        <div class="controls">
                            <input type="password" name="password"  class="form-control form Button-Up" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label"><b>Email Address</b></label>
                        <div class="controls">
                            <input type="email" name="email"  class="form-control form Button-Up" placeholder="name@example.com" required>
                        </div>
                        <br>
                    </div>
                    <div class="col-6">
                        <label class="form-label"><b>Telp</b></label>
                        <div class="controls">
                            <input type="text" name="telp"  class="form-control form Button-Up" placeholder="08967565" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><b>Alamat Lengkap</b></label>
                    <div class="controls">
                        <textarea type="text" name="alamat" class="form-control form Button-Up"  rows="3" required></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"> <b>Unggah Foto</b></label>
                    <input type="file" name="foto" class="form-control form Button-Up">
                </div>
                <div class="mb-3">
                    <div class="controls mt-3">
                        <button type="submit" name="add_user" class="btn btn-primary">Add New User</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </section>
    </main>
    <!-- ===== Footer ===== -->
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