<?php
// Initialize the session
session_start();

$password_err = "";
$password = ""; 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } else{
        $password = trim($_POST["password"]);
    }

        
       if($password== "1234")
            // Redirect user to welcome page
                  header("location: register_admin.php");
                }
    
    

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    
</head>
<body class="bg-gradient-primary">
    <div class="container">
          <!-- Outer Row -->
        <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
              <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Admin confirmation</h1>
                    </div>
                
              
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
            
           
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" placeholder = "Password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                  <input type= "submit" class = "btn btn-primary" value="Login">
            </div>
            <p><a href="login.php">Back to login page</a>.</p>
            
        </form>
    </div>  
               </div>
            </div>
        </div>
          </div>
            </div>
        </div>
    </div>
    <script src ="js/sb-admin-2.js"></script>
    <script src ="js/login.js"></script>
</body>
</html>