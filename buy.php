<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purchasing</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6">
                    <form method="POST" enctype="multipart/form-data">
                        Please enter the amount of the product
                        <input type="number" class="form-control form-control-user" name="product_price"><br>
                        <input type="submit" class="form-control" name="submit" value="Ok"><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if(isset($_POST['submit'])) {
    if (empty($_POST["product_price"])) {
        echo "
        <div class=\"card shadow mb-4\">
            <div class=\"card-body \">
                <div class=\"h5 mb-0 font-weight-bold text-gray-800\">Please enter a value</div>
            </div>
        </div>";
    }else{
        $total=$_POST['product_price']*100;
        echo "
        <div class=\"card shadow mb-4\">
            <div class=\"card-body \">
                <div class=\"h5 mb-0 font-weight-bold text-gray-800\">The total price is $total</div>
            </div>
        </div>";
    }
}
?>
