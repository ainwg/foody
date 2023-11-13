<?php 
include ('database.php');

?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Background.css">

</head>
<body>
      <div>
      <table border="1" align="center">
        <tr>
	 <?php include 'template.php' ?>
       <table border="1" align="center" style="background : white" border="1" align="center">
            <td rowspan="5" style="width: 160px;height: 100px;">
            <table style="background : white" border="1" align="center">
		<td>ORDER LIST ID</td>
		<td>ORDER ID</td>
		<td>MENU ID</td>
		<td>QUANTITY</td>
    <td>STATE</td>
    <td>DATE</td>

		<tbody>
 <?php 
$count=1;
$sel_query="Select * from list ORDER BY orderlistid desc;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["orderid"]; ?></td>
<td align="center"><?php echo $row["menuid"]; ?></td>
<td align="center"><?php echo $row["list_quantity"]; ?></td>
<td align="center"><?php echo $row["list_state"]; ?></td>
<td align="center"><?php echo $row["list_date"]; ?></td>


</tr>
<?php $count++; } 
?>

</table>
<center><a href="DELIVER.php"><button type="button" >NEXT</button></a>
</center>

                  </tbody>
</div>
	  	      <div class="footer">
      <p>Copyright &copy; 2022 UMP FOODY. All rights reserved.</p>
    </div>
</body>
</html>