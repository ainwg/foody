<?php

if(isset($_POST['username'])){
	$uname=$_POST['username'];
	$password=$_POST['pass'];

	$sql="select * from admin where username='$uname'AND password='$password'
	limit 1";

	$result=mysqli_query($link,$sql);

	if(mysqli_num_rows($result)==1)
	{
		// echo "Login Successful. Welcome!";
        // echo '<script type="text/javascript">';
        // echo 'alert("Login Successful. Welcome!")';
        // echo '</script>';
        header("Location: adminHome.php");
		exit();
	}
	else
	{
		echo "Login Not Successful. Please enter the correct information.";
		exit();
	}

}
mysqli_close($link);
?>