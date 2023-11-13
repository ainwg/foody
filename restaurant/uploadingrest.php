<?php
  include("dbase.php");
  session_start();
?>
<!DOCTYPE html>
<?php 
   
        

    mysqli_select_db($conn, "foody") or die(mysqli_connect_error());
    $fi = $_POST["foodid"];
    $fn = $_POST["foodname"];
    $fp = $_POST["foodprice"];
    $fc = $_POST["cate"];
    $fd = $_POST["desc"];
    $fs = $_POST["state"];
    

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'img/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sqlimage = "INSERT INTO menu(menuid, menuname,menuprice,menucategory,menudesc,menustatus,menuphoto) 
				        VALUES('$fi','$fn','$fp','$fc','$fd','$fs','$new_img_name')";
				mysqli_query($conn, $sqlimage);
				header("Location: restaurant.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: insertrest.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: insertrest.php?error=$em");
	}

}else {
	header("Location: insertrest.php");
}

?>