<?php
// Initialize the session
include ("./include/auth.php");
include ("./include/config.php");

// Prepare a select statement
        $sql = "SELECT id FROM admin WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_SESSION["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                     echo "";
                } else {
                     header("location: warning.php");
                }
              }
            }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-commerce</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ecommerce</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="index.php">
          <i class="fa fa-home"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Shopping
      </div>

        <!-- Nav Item - Courses -->

        <li class="nav-item">
            <a class="nav-link" href="course1.php">
                <i class="fa fa-qrcode"></i>
                 <span>Shopping</span></a>
        </li>

      <!-- Nav Item - Courses -->

        <li class="nav-item">
            <a class="nav-link" href="course1.php">
                <i class="fa fa-qrcode"></i>
                 <span>Cart</span></a>
        </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Only for Admis
      </div>

        <!-- Nav Item - Courses -->

        <li class="nav-item active">
            <a class="nav-link" href="add_product.php">
                <i class="fa fa-qrcode"></i>
                 <span>Add Product</span></a>
        </li>

       




      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

         <div class="topbar-divider d-none d-sm-block"></div>


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle"  id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Rosemary</span>
                <img class="img-profile rounded-circle" src="https://images.unsplash.com/photo-1534559529872-1a83a6cbc03d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              
              <h1 class=" h1 mb-0 text-gray-800"  >Add Product</h1>

          </div>

          <!-- Content Row -->
          <div class="row">


  <form method="POST" enctype="multipart/form-data">
                            Product name:
                            <input type="text" class="form-control form-control-user" name="product_name"><br>
                            Product description:
                            <input type="text" class="form-control form-control-user" name="product_description"><br>
                            Product spec:
                            <input type="text" class="form-control form-control-user" name="product_spec"><br>
                            Product price:
                            <input type="number" class="form-control form-control-user" name="product_price"><br>
                            <div class="form-group">
                                Upload product cover:<br>
                                <input type="file" class="form-control-user" name="product_cover"><br><br>
                                Upload product details in picture:
                                <input type="file" class="form-control-user" name="image_detail[]" multiple="multiple"><br>
                            </div>
                            <input type="submit" class="btn btn-secondary btn-user btn-block" name="submit" value="Upload product"><br>
                        </form>

                        <!-- navigate buttons -->



      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>



<?php

if(isset($_POST['submit'])) {
    $error=array();
    if (empty($_POST["product_name"])) {
        $error[]= "Please enter a value for the product name.<br>";
    }
    if (empty($_POST["product_price"])) {
        $error[]= "Please enter a value for the product price.<br>";
    }
    if (empty($_POST["product_description"])) {
        $error[]= "Please enter a value for the product description.<br>";
    }
    if (empty($_POST["product_spec"])) {
        $error[]= "Please enter a value for the product spec.<br>";
    }
    if(isset($_FILES['product_cover'])) {
        $file_tmp = $_FILES['product_cover']['tmp_name'];
        $file_name = $_FILES['product_cover']['name'];
        $file_size = $_FILES["product_cover"]["size"];
        $file_extension = strtolower(end(explode('.', $file_name)));
        if (getimagesize($file_tmp) == false) {
            $error[]= "The file cannot be recognize.<br>";
        } elseif ($file_size > 50000000) {
            $error[]= "Please use a smaller picture(<50M).<br>";
        } elseif (in_array($file_extension, array("jpeg", "jpg", "png")) === false) {
            $error[]= "Sorry, only JPG, JPEG, PNG files are allowed.<br>";
        }
    }
    if(isset($_FILES['image_detail'])) {
        foreach($_FILES['image_detail']['name'] as $key=>$name) {
            $file_tmp = $_FILES['image_detail']['tmp_name'][$key];
            $file_name = $_FILES['image_detail']['name'][$key];
            $file_size = $_FILES["image_detail"]["size"][$key];
            $file_extension = strtolower(end(explode('.', $file_name)));
            if (getimagesize($file_tmp) == false) {
                $error[]= "The file cannot be recognize.<br>";
            } elseif ($file_size > 50000000) {
                $error[]= "Please use a smaller picture(<50M).<br>";
            } elseif (in_array($file_extension, array("jpeg", "jpg", "png")) === false) {
                $error[]= "Sorry, only JPG, JPEG, PNG files are allowed.<br>";
            }
        }
    }
    if(count($error)==0){
        include_once "database.php";
        $product_name = $_POST["product_name"];
        $product_description = $_POST["product_description"];
        $product_spec = $_POST["product_spec"];
        $product_price = $_POST["product_price"];
        $query = "INSERT INTO product(product_name, product_description, product_price, product_spec) VALUES ('$product_name', '$product_description', '$product_price', '$product_spec')";
        if(mysqli_query($link, $query)) {
            $last_product_id = mysqli_insert_id($link);
            $query = "INSERT INTO product_picture(product_id) VALUES ('$last_product_id')";
            if (mysqli_query($link, $query)) {
                $last_picture_id = mysqli_insert_id($link);
                $file_tmp = $_FILES['product_cover']['tmp_name'];
                move_uploaded_file($file_tmp, "product_pictures/" . $last_picture_id . ".png");
            }
            foreach($_FILES['image_detail']['name'] as $key=>$name) {
                if (mysqli_query($link, $query)) {
                    $last_picture_id = mysqli_insert_id($link);
                    $file_tmp = $_FILES['image_detail']['tmp_name'][$key];
                    move_uploaded_file($file_tmp, "product_pictures/" . $last_picture_id . ".png");
                }
            }
        }
        header("Location:product_mgt.php");
    }else{
        echo "<br>";
         foreach($error as $error_output){
             echo $error_output;
         }
    }
}
?>