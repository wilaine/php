<?php
include ("./include/auth.php");
    include ("./include/config.php");

if(isset($_GET['id'])){
    $product_id=$_GET['id'];
    
    $query = "SELECT * FROM product WHERE product_id=$product_id";
    $result = mysqli_query($link, $query) or die(mysqli_error());
    $row = mysqli_fetch_array($result);
    $product_name = $row["product_name"];
    $product_description = $row["product_description"];
    $product_price = $row["product_price"];
    $product_sales = $row["product_sales"];
    $product_spec = $row["product_spec"];
    $query = "SELECT product_picture_id FROM product_picture WHERE product_id=$product_id";
    $result = mysqli_query($link, $query) or die(mysqli_error());
    $product_pictures= [];
    while($row = mysqli_fetch_array($result)) {
        $product_pictures[] = "product_pictures/$row[0].png";
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
                <i class="fa fa-shopping-cart "></i>
                 <span>Cart</span></a>
        </li>

 

      <!-- Divider -->
      <hr class="sidebar-divider">

<?php
if(isset($_SESSION['username'])){
$sql ="SELECT id FROM admin WHERE username = ?";
if($stmt = mysqli_prepare($link,$sql)){
  mysqli_stmt_bind_param($stmt,"s",$param_username);
  $param_username = $_SESSION['username'];
  if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
 
?>

      <!-- Heading -->
      <div class="sidebar-heading">
        Only for Admis
      </div>

        <!-- Nav Item - Courses -->

        <li class="nav-item">
            <a class="nav-link" href="add_product.php">
                <i class="fa fa-plus-square "></i>
                 <span>Add Product</span></a>
        </li>

        <!-- Nav Item - Courses -->

        <li class="nav-item">
            <a class="nav-link" href="product_mgt.php">
                <i class="fa fa-archive "></i>
                 <span>Product Management</span></a>
        </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

<?php 
                   
                }else{
                  
                }  
            }
}

}

?>
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["username"]?></span>
                <img class="img-profile rounded-circle" src="https://cdn2.iconfinder.com/data/icons/user-icon-2-1/100/user_5-15-512.png">
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
              
              <h1 class=" h1 mb-0 text-gray-800"  >Home - Ecommerce</h1>

          </div>

          <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="text-md font-weight-bold text-primary mb-1"> <?php echo $product_name; ?></div>
                    <div class="text-center">
                        <?php
                        echo "<img class=\"img-fluid px-3 px-sm-4 mt-3 mb-4\" style=\"rem;\" src=$product_pictures[0] alt=\"\">";
                        ?>
                    </div>
                </div>
                <div class="card-header py-3"> </div>
                <div class="card-body">
                    <?php
                    echo "<div class=\"h5 font-weight-bold text-primary text-uppercase mb-1\">$product_description)</div>";
                    echo "<div class=\"h5 mb-0 font-weight-bold text-gray-800\">RM $product_price</div>";
                    ?>
                    <div class="h5 font-weight-light">free delivery</div>
                    <div class="h5 font-weight-light fa"><?php echo $product_sales." Sold" ?></div>
                    <div>
          <a href="buy.php?id=<?php echo $product_id; ?>" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm"><i class="fas fa-lg"></i> Buy it</a>
                    <a href="#" class="btn btn-danger btn-circle"><i class="fas fa-lg"></i> Like</a>
                    </div>
                </div>
                <div class="card-header py-3"> </div>
                <div class="card-body">
                    <div class="h2 mb-0 font-weight-light text-gray-800">Product Spec</div>
                    <?php
                    echo "<div class=\"h5 mb-0 font-weight-light text-gray-1600\">$product_spec</div>";
                    ?>
                </div>
                <div class="card-header py-3"> </div>
                <div class="card-body">
                    <?php
                    for($i=1; $i<count($product_pictures); $i++) {
                        echo "<img class=\"img-fluid px-3 px-sm-4 mt-3 mb-4\" style=\"rem;\" src=$product_pictures[$i] alt=\"\">";
                    }
                    ?>
                </div>
            </div>
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
