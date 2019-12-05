<?php
if(isset($_GET['id'])){
    $product_id=$_GET['id'];
    include "database.php";
    $query = "SELECT * FROM product WHERE product_id=$product_id";
    $result = mysqli_query($connection, $query) or die(mysqli_error());
    $row = mysqli_fetch_array($result);
    $product_name = $row["product_name"];
    $product_description = $row["product_description"];
    $product_price = $row["product_price"];
    $product_sales = $row["product_sales"];
    $product_spec = $row["product_spec"];
    $query = "SELECT product_picture_id FROM product_picture WHERE product_id=$product_id";
    $result = mysqli_query($connection, $query) or die(mysqli_error());
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

        <title><?php echo $product_name; ?></title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    </head>

    <body id="page-top">

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

            <!-- navigate buttons -->
            <div>
                <a href="product_management.php" class='btn btn-primary btn-lg'>Go back to product management</a>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

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

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

    </body>

</html>
