<?php

include('server.php');
//include('logindetail.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>UMP FOODY</title>
 <!-- Bootstrap core CSS-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <!-- Custom fonts for this template-->
 <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <!-- Custom styles for this template-->
 <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-dark">
 <div class="container">
   <div class="card card-login mx-auto mt-5" style="width: 35rem;">
     <div class="card-header">Login</div>
     <div class="card-body">
       <form method="post" action="Login.php">
          <?php //include('errors.php'); ?>
         <div class="form-group">
           <label for="exampleInputEmail1">Username</label>
           <input class="form-control"  type="text" name="username">
         </div>
         <div class="form-group">
           <label for="exampleInputPassword1">Password</label>
           <input class="form-control"  type="password" name="pass">
         </div>
         <div class="form-group">
           <div class="form-check">
             <label class="form-check-label">
               <input class="form-check-input" type="checkbox"> Remember Password</label>
           </div>
           <div class="type">
                <label for="events">Type of user: </label>
                <select name="userType" id="events">
                    <option value="RO">RestaurantOwner</option>
                    <option value="Rider">Rider</option>
                    <option value="GU">User</option>
                </select>
            </div>
         </div>
         <br>
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary btn-block" name="login_user">Login</button>
            </div>
            <?php include 'logindetail.php'; ?>
       </form>
       <div class="text-center">
         <a class="d-block small mt-3" href="signup.php">Register an Account</a>
      <!-- <a class="d-block small" href="forgot-password.php">Forgot Password?</a>-->
       </div>
       <div class="text-center">
         <a class="d-block small mt-3" href="adminlogin.php">Admin Login</a>
      <!-- <a class="d-block small" href="forgot-password.php">Forgot Password?</a>-->
       </div>
     </div>
   </div>
 </div>
 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- Core plugin JavaScript-->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>