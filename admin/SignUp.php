<?php include('server.php');
if (isset($_POST['reg_user'])){
  $username = $_POST['username'];
  $password = $_POST['password_1'];
  $email = $_POST['email'];
  $userType = $_POST['userType'];
  
  $sql = "INSERT INTO `userlogin`(`ID`, `user_ID`, `password`, `email`, `userType`) VALUES ('[value-1]','$username','$password','$email','$userType')";
  
  mysqli_query($link,$sql);

		echo "Registered successfully. Welcome!";
        echo '<script type="text/javascript">';
        echo 'alert("Registered successfully.!")';
        echo '</script>';
    header("Location: SignUp.php");
		exit();
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

   <div class="card card-register mx-auto mt-5" style="width: 35rem;">

     <div class="card-header" style="align-center">Register an Account</div>

     <div class="card-body">

       <form method="POST" action="">

         <?php //include('errors.php'); ?>

         <div class="form-group">

           <div class="form-row">

             <div class="col-md-12">

               <label for="InputUsername">Username</label>

               <input class="form-control" id="exampleInputName" type="text"   name="username" value="<?php //echo $username; ?>" required>

             </div>

           </div>

         </div>

         <div class="form-group">

           <label for="InputEmail1">Email address</label>

           <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" name="email" value="<?php //echo $email; ?>" required >

         </div>

         <div class="form-group">

           <div class="form-row">

             <div class="col-md-6">

               <label for="Password">Password</label>

               <input class="form-control" id="exampleInputPassword1" type="password" name="password_1" required>

             </div>

            <div class="col-md-6">

               <label for="ConfirmPassword">Confirm Password</label>

               <input class="form-control" id="exampleInputPassword2" type="password" name="password_2" required>

             </div>

             <div class="col-md-6">

               <label for="UserType">Usertype(GU/RO/Rider)</label>

               <input class="form-control" id="userType" type="text" name="userType" required>

             </div>

           </div>

         </div>
         <br>
         <!-- <div class="type">
                <label for="event">Type of user: </label>
                <select name="event" id="events">
                    <option value="RestaurantOwner">User</option>
                    <option value="Rider">Rider</option>
                    <option value="User">Restaurant Owner</option>
                </select>
            </div> -->
         </div>
         <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary btn-block" name="reg_user">Register</button>
</div>
       </form>

       <div class="text-center">

         <a class="d-block small mt-3" href="login.php">Login Page</a>

       <!--- <a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->

       </div>

     </div>

   </div>

 </div>

 <!-- Bootstrap core JavaScript-->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 <!-- Core plugin JavaScript-->

 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>