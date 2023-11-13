<?php

if(isset($_POST['username'])){
	$uname=$_POST['username'];
	$password=$_POST['pass'];
	$userType=$_POST['userType'];

	$sql="select * from userlogin where user_ID='$uname'AND password='$password' AND userType='$userType'
	limit 1";

	$result=mysqli_query($link,$sql);

	if(mysqli_num_rows($result)==1)
	{

		$row = mysqli_fetch_assoc($result);
        
		if ($userType=="RO")
		{
			$_SESSION['id'] = $uname;
			header("Location: ../restaurant/dashboard.php");	
		}
		else if ($userType=="Rider")
		{
			$_SESSION['id'] = $uname;
			header("Location: ../rider/index.php");		
	
		}
		else if ($userType=="GU")
		{
			$_SESSION['id'] = $uname;
		 	header("Location: ../complaint/index.php");
		}
	}
	else
	{
		echo 'No User Found';
		exit();
	}
}

mysqli_close($link);
?>